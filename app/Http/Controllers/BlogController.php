<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class BlogController extends Controller
{

    private $blogRepository;
    private $commentRepository;
    public function __construct(BlogRepositoryInterface $blogRepository, CommentRepositoryInterface $commentRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->commentRepository = $commentRepository;
    }

    public function getBlogsList()
    {
        $blogs = $this->blogRepository->Get();
        return view('ListBlogs', ['blogs' => $blogs]);
    }

    public function saveBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|max:1000',
            'author' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/saveBlog')
                ->withInput()
                ->withErrors($validator);
        }

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $image->storeAs('uploads', $imageName, 'public');
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'author' => $request->author,
        ];

        $this->blogRepository->Save($data);

        return redirect('/home');
    }

    public function deleteBlog($id)
    {
        $this->blogRepository->Delete($id);
        return redirect('/home');
    }

    public function getEditBlog($id)
    {
        $blog = $this->blogRepository->Find($id);
        return view('editBlog', ['blog' => $blog]);
    }


    public function PostComments(Request $request)
    {
        $input = [
            'user_id' => Auth::user()->id,
            'blog_id' => $request->id,
            'comment' => $request->comments,
        ];

        $this->commentRepository->Add($input);
        // redirect()->back();
        return redirect('/home');
    }

    public function saveEditedBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'description' => 'required|max:100',
            'author' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        if ($request->hasFile('editImage')) {
            $image = $request->editImage;
            $imageName = $image->getClientOriginalName();
            $image->storeAs('uploads', $imageName, 'public');
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'author' => $request->author
            ];

            $this->blogRepository->Update($request->id, $data);
        } else {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author
            ];

            $this->blogRepository->Update($request->id, $data);
        }

        return redirect('/home');
    }

    public function getSaveBlog()
    {
        return view('/saveBlog');
    }
}
