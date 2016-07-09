<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use DB;
use Validator;
use File;

class BookController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data_book = DB::table('bookstore')->get();
		return view('pages.bookstore.index')->with('data_book',$data_book);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pages.bookstore.form-book');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate Form
		$messages = [
			'required'	=> 'ข้อมูล :attribute จำเป็นต้องกรอก',
			'email'		=> 'รูปแบบ :attribute  ไม่ถูกต้อง',
			'numeric'	=> 'ข้อมูล :attribute  ต้องเป็นตัวเลขเท่านั้น',
			'min'		=> 'ข้อมูล :attribute ต้องไม่น้อยกว่า :min ตัว',
			'mimes'	=> 'ข้อมูล :attribute ต้องเป็นรูปภาพเท่านั้น',
			'size'		=> 'ขนาด :attribute ต้องไม่เกิน :size kb'
		];


		$rules = [
			'isbn'		=> 'required',
			'title'		=> 'required',
			'auther'	=> 'required',
			'publisher'	=> 'required',
			'cover'		=> 'required|mimes:jpeg,gif,png|max:500'
		];

		$validator = Validator::make(Request::all(),$rules,$messages);


		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}else{
			// Path to save book cover image
			$destinationPath = "resources/assets/images/bookcover/";

			// upload file
			$extension = Request::file('cover')->getClientOriginalExtension();
			$random_number = time();
			$NewFilename = $random_number.'.'.$extension;

			Request::file('cover')->move($destinationPath, $NewFilename);


			$data_book = array(
				'isbn'		=> Request::input('isbn'),
				'title'		=> Request::input('title'),
				'auther'	=> Request::input('auther'),
				'publisher'	=> Request::input('publisher'),
				'cover'		=> $NewFilename,
				'status'		=> Request::input('status')
			);

			$book_insert = DB::table('bookstore')->insert($data_book);
			if($book_insert)
			{
				return redirect('books')->with('status','<div class="alert alert-success">Insert Book Success</div>');
			}else{
				return redirect('books')->with('status', '<div class="alert alert-danger">Insert Book Fail</div>');
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data_book = DB::table('bookstore')->where('id','=',$id)->first();
		return view('pages.bookstore.book-detail')->with('data_book',$data_book);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data_book = DB::table('bookstore')->where('id','=',$id)->first();
		return view('pages.bookstore.book-edit-form')->with('data_book',$data_book);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Path to save book cover image
		$destinationPath = "resources/assets/images/bookcover/";

		if(Request::hasFile('cover')){
			// upload file
			$extension = Request::file('cover')->getClientOriginalExtension();
			$random_number = time();
			$NewFilename = $random_number.'.'.$extension;

			Request::file('cover')->move($destinationPath, $NewFilename);
		}

		$data_book = array(
			'isbn'		=> Request::input('isbn'),
			'title'		=> Request::input('title'),
			'auther'	=> Request::input('auther'),
			'publisher'	=> Request::input('publisher'),
			'status'		=> Request::input('status'),
		);

		if(Request::hasFile('cover')){
			$data_book = array(
				'cover'	=> $NewFilename
			);
		}

		$update_book = DB::table('bookstore')->where('id','=',$id)->update($data_book);

		if($update_book)
		{
			return redirect('books')->with('status','<div class="alert alert-success">Update Book Success</div>');
		}else{
			return redirect('books');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data_book = DB::table('bookstore')->where('id','=',$id)->first(['cover']);
		$delete_book = DB::table('bookstore')->where('id','=',$id)->delete();
		if($delete_book)
		{
			$destinationPath = "resources/assets/images/bookcover/";
			File::Delete($destinationPath.$data_book->cover);

			return redirect('books')->with('status','<div class="alert alert-success">Delete Book Success</div>');
		}else{
			return redirect('books')->with('status','<div class="alert alert-danger">Delete Book Fail!!</div>');
		}
	}


	public function book_detail($id)
	{
		$data_book = DB::table('bookstore')->where('id','=',$id)->first();
		return view('pages.bookstore.book-detail-modal')->with('data_book',$data_book);
	}

	public function book_edit($id)
	{
		$data_book = DB::table('bookstore')->where('id','=',$id)->first();
		return view('pages.bookstore.book-edit-modal-form')->with('data_book',$data_book);
	}
}
