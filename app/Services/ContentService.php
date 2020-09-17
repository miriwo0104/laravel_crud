<?php

namespace App\Services;

use App\Models\Content;

class ContentService
{
    public function getContent(){
        $contents_get_query = Content::select('*');
        return $contents_get_query->get();
    }

    public function getEditContent($content_id){
        $contents_edit_query = Content::select('*');
        $contents_edit_query->where('id', $content_id);
        return $contents_edit_query->get();
    }
}