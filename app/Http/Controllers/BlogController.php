<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->paginate(5);
        return view('blog.blog-index', compact('blog'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create()
    {
        return view('blog.blog-create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'    =>  'required',
            'content'     =>  'required',
            'image'         =>  'required|mimes:jpeg,jpg,png|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/blogs'), $new_name);
        $form_data = array(
            'title'    => $title = $request->title,
            'content'  => $request->content,
            'image'    => $new_name,
            'slug' => Str::slug($title)

        );

        Blog::create($form_data);

        return redirect('/blogs')->with('message', 'Blog created successfully.');
    }


    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.blog-show', compact('blog'));
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.blog-edit', compact('blog'));
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        if ($request->hasFile('image')) {
            $path = public_path('images/blogs' . $blog->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $extension = $request->image->extension();
            $fileName = Str::slug($request->title, '_') . '_' . md5(date('Y-m-d H:i:s'));
            $fileName = $fileName . '.' . $extension;
            $blog->image = $fileName;
            $request->image->move('images/blogs/', $fileName);
        }

        $blog->save();
        return redirect('/blogs')->with('message', 'Blog is successfully updated');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('/blogs')->with('message', 'Blog is successfully deleted');
    }
}
