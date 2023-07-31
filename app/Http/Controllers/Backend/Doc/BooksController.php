<?php

namespace App\Http\Controllers\Backend\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\BookType;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::orderBy('id','desc')->get();
        return view('backend.document.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $term = Term::orderBy('id','desc')->get();
        $booktype = BookType::orderBy('id','desc')->get();
        return view('backend.document.book.create',compact('term','booktype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'term_id'=>'required',
            'book_type_id'=>'required',
            'name'=>'required',
        ],[
            'term_id.required'=>'ກະລຸນາເລືອກ ປີຮຽນ ກ່ອນ!',
            'book_type_id.required'=>'ກະລຸນາເລືອກ ປະເພດໜັງສື ກ່ອນ!',
            'name.required'=>'ກະລຸນາເພີ່ມ ຊື່ໜັງສືຮຽນ ກ່ອນ!',
        ]);

        if($request->has('file_pdf') && $request->has('pic'))
        {
            $pdffile = $request->file_pdf;
            $pdffilename = time().$pdffile->getClientOriginalName();
            $pdffile->move('images/book/pdf/',$pdffilename);

            $file = $request->pic;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/book/',$filename);


            Book::create([
                'term_id'=>$request->term_id,
                'book_type_id'=>$request->book_type_id,
                'name'=>$request->name,
                'file'=>'images/book/pdf/'.$pdffilename,
                'image'=>'images/book/'.$filename,
                'note'=>$request->note,
                'status'=>$request->status,
            ]);
            
        }elseif($request->has('file_pdf')){
            $pdffile = $request->file_pdf;
            $pdffilename = time().$pdffile->getClientOriginalName();
            $pdffile->move('images/book/pdf/',$pdffilename);

            Book::create([
                'term_id'=>$request->term_id,
                'book_type_id'=>$request->book_type_id,
                'name'=>$request->name,
                'file'=>'images/book/pdf/'.$pdffilename,
                'note'=>$request->note,
                'status'=>$request->status,
            ]);
        }elseif($request->has('pic')){
            $file = $request->pic;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/book/',$filename);

                Book::create([
                    'term_id'=>$request->term_id,
                    'book_type_id'=>$request->book_type_id,
                    'name'=>$request->name,
                    'image'=>'images/book/'.$filename,
                    'note'=>$request->note,
                    'status'=>$request->status,
                ]);
        }else{
                Book::create([
                    'term_id'=>$request->term_id,
                    'book_type_id'=>$request->book_type_id,
                    'name'=>$request->name,
                    'note'=>$request->note,
                    'status'=>$request->status,
                ]);
        }
        return redirect()->route('book.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $term = Term::where('status', 1)->orderBy('id','desc')->get();
        $booktype = BookType::where('status', 1)->orderBy('id','desc')->get();
        return view('backend.document.book.edit',compact('book','term','booktype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'term_id'=>'required',
            'book_type_id'=>'required',
            'name'=>'required',
        ],[
            'term_id.required'=>'ກະລຸນາເລືອກ ປີຮຽນ ກ່ອນ!',
            'book_type_id.required'=>'ກະລຸນາເລືອກ ປະເພດໜັງສື ກ່ອນ!',
            'name.required'=>'ກະລຸນາເພີ່ມ ຊື່ໜັງສືຮຽນ ກ່ອນ!',
        ]);
        $book = Book::find($id);

        if($request->has('file_pdf') && $request->has('pic'))
        {
            $pdffile = $request->file_pdf;
            $pdffilename = time().$pdffile->getClientOriginalName();
            $pdffile->move('images/book/pdf/',$pdffilename);

            $file = $request->pic;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/book/',$filename);


            $book_data =[
                'term_id'=>$request->term_id,
                'book_type_id'=>$request->book_type_id,
                'name'=>$request->name,
                'file'=>'images/book/pdf/'.$pdffilename,
                'image'=>'images/book/'.$filename,
                'note'=>$request->note,
                'status'=>$request->status,
            ];
            
        }elseif($request->has('file_pdf')){
            $pdffile = $request->file_pdf;
            $pdffilename = time().$pdffile->getClientOriginalName();
            $pdffile->move('images/book/pdf/',$pdffilename);

            $book_data =[
                'term_id'=>$request->term_id,
                'book_type_id'=>$request->book_type_id,
                'name'=>$request->name,
                'file'=>'images/book/pdf/'.$pdffilename,
                'note'=>$request->note,
                'status'=>$request->status,
            ];
        }elseif($request->has('pic')){
            $file = $request->pic;
            $filename = time().$file->getClientOriginalName();
            $file->move('images/book/',$filename);

                $book_data = [
                    'term_id'=>$request->term_id,
                    'book_type_id'=>$request->book_type_id,
                    'name'=>$request->name,
                    'image'=>'images/book/'.$filename,
                    'note'=>$request->note,
                    'status'=>$request->status,
                ];
        }else{
                $book_data = [
                    'term_id'=>$request->term_id,
                    'book_type_id'=>$request->book_type_id,
                    'name'=>$request->name,
                    'note'=>$request->note,
                    'status'=>$request->status,
                ];
        }

        $book->update($book_data);
        return redirect()->route('book.index')->with('success','ບັນທຶກຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index')->with('success','ລຶບຂໍ້ມູນສຳເລັດ!');
    }

    public function download($id)
    {
        $book = Book::find($id);
        return response()->file($book->file);
    }
}
