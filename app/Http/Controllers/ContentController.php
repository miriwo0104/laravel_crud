<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Http\Requests\ContentRequest;
// 下記を追記する
use App\Services\ContentService;

class ContentController extends Controller
{
    // 下記を追記する
    private $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }
    // 上記までを追記する

    public function input()
    {
        return view('contents.input');
    }

    public function save(ContentRequest $contentRequest)
    {
        $input_content = new Content();
        $input_content->content = $contentRequest['content'];
        $input_content->save();
        
        return redirect('/output');
    }

    public function output()
    {
        // 下記を修正する
        $all_contents = $this->contentService->getContent();
        
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
        $edit_contents = $this->contentService->getEditContent($content_id);
        $edit_content = $edit_contents[0];

        return view('contents.edit', [
            'edit_content' => $edit_content,
        ]);
    }

    public function update(ContentRequest $contentRequest)
    {
        $contents_update_query = Content::select('*');
        $contents_update_query->where('id', $contentRequest['content_id']);
        $update_contents = $contents_update_query->get();

        $update_content = $update_contents[0];
        $update_content->content = $contentRequest['content'];
        $update_content->save();

        return redirect('/output');
    }
}
