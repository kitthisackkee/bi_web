<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ExportDoc;
use App\Models\News;
use App\Models\DocType;

class DocumentComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $searchExam;

    public function render()
    {
        $exprot_doc = ExportDoc::orderBy('id','desc')
            ->where('short_title','like', '%'. $this->search . '%')
            //->Orwhere('short_title','like', '%'. $this->search . '%')
            ->where('showweb',1)->where('doc_type','!=','1')->paginate(10);

        $exam_doc = ExportDoc::orderBy('id','desc')
            ->where('short_title','like', '%'. $this->searchExam . '%')
            //->Orwhere('short_title','like', '%'. $this->search . '%')
            ->where('showweb',1)->where('doc_type',1)->paginate(10);

        $doctype = DocType::all();

        $random_news = News::inRandomOrder()->limit(20)->get();

        return view('livewire.frontend.document-component', compact('exprot_doc','exam_doc','doctype','random_news'))
        ->layout('layouts.frontend.base-frontend');
    }
}
