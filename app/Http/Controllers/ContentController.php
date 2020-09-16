<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
// 下記を追記する
use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
    public function input()
    {
        return view('contents.input');
    }

    // 下記を修正する
    public function save(ContentRequest $contentRequest)
    {
        // バリデーションルールとバリデート命令を削除する
        $input_content = new Content();
        // 下記を修正する
        $input_content->content = $contentRequest['content'];
        $input_content->save();
        
        return redirect('/output');
    }

    public function output()
    {
        $contents_get_query = Content::select('*');
        $all_contents = $contents_get_query->get();
        
        return view('contents.output', [
            'all_contents' => $all_contents,
        ]);
    }

    public function delete(Request $request)
    {
        $contents_delete_query = Content::select('*');
        $contents_delete_query->where('id', $request['content_id']);
        $contents_delete_query->delete();

        return redirect('/output');
    }

    public function edit($content_id)
    {
        $contents_edit_query = Content::select('*');
        $contents_edit_query->where('id', $content_id);
        $edit_contents = $contents_edit_query->get();
        $edit_content = $edit_contents[0];

        return view('contents.edit', [
            'edit_content' => $edit_content,
        ]);
    }

    // 下記を修正する
    public function update(ContentRequest $contentRequest)
    {
        // バリデーションルールとバリデート命令を削除する
        $contents_update_query = Content::select('*');
        // 下記を修正する
        $contents_update_query->where('id', $contentRequest['content_id']);
        $update_contents = $contents_update_query->get();

        $update_content = $update_contents[0];
        // 下記を修正する
        $update_content->content = $contentRequest['content'];
        $update_content->save();

        return redirect('/output');
    }
}
