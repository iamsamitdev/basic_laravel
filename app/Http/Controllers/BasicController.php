<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Validator;
use DB;
use Mail;
use Hash;
use Excel;

// เรียกใช้ Model
use App\Model\Member;
use App\Model\Product;
use App\User;

class BasicController extends Controller {

	public function home()
	{
		return view('pages.home');
	}

	public function about_us()
	{
		return view('pages.about-us');
	}

	public function service()
	{
		return view('pages.service');
	}

	public function portfolio()
	{
		return view('pages.portfolio');
	}

	public function blog()
	{
		return view('pages.blog');
	}

	public function contact()
	{
		return view('pages.contact');
	}

	public function register()
	{
		return view('pages.register');
	}

	public function register_post()
	{
		// Validate Form
		$messages = [
			'required'	=> 'ข้อมูล :attribute จำเป็นต้องกรอก',
			'email'		=> 'รูปแบบ :attribute  ไม่ถูกต้อง',
			'numeric'	=> 'ข้อมูล :attribute  ต้องเป็นตัวเลขเท่านั้น',
			'min'		=> 'ข้อมูล :attribute ต้องไม่น้อยกว่า :min ตัว'
		];


		$rules = [
			'fullname'	=> 'required',
			'email'		=> 'required|email',
			'tel'		=> 'required',
			'age'		=> 'required|numeric',
			'address'	=> 'required|Min:5'
		];

		$validator = Validator::make(Request::all(),$rules,$messages);


		if($validator->fails())
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}else{
			// Insert to database
			//$input = Request::all();

			// Custom field
			$input = array(
				'fullname' 	=> Request::input('fullname'),
				'email'		=> Request::input('email'),
				'tel'		=> Request::input('tel'),
				'age'		=> Request::input('age'),
				'address'	=> Request::input('address'),
				'status'		=> '1',
				'gender'	=> 'male',
				'avartar'	=> 'no_avatar.jpg'
			);

			//dd($input);
			$data_insert = Member::create($input);

			if($data_insert->exists())
			{
				return redirect('register')->with('status','<div class="alert alert-success">Register Success</div>');
			}else{
				return redirect('register')->with('status','<div class="alert alert-danger">Register Fail</div>');
			}
			
		}
	}


	public function showmember()
	{
		//return Member::all();
		//return Member::find(4);
		//return Member::where('email','=','john@gmail.com')->get();
		//return Member::where('gender','=','male')->where('age','>','30')->get();
		//return Member::where('gender','=','male')->orderBy('age','desc')->first();

		$data_member = Member::all();
		$data_member_count = Member::all()->count();

		//return $data_member_count;
		return view('pages.showmember')->with(
			array(
				'data_member'	=>$data_member,
				'data_member_count'=>$data_member_count
			)
		);
	}


	public function showproduct()
	{
		//$data_product = Product::all();
		//$data_product_count = Product::all()->count();

		// Join table
		$data_product = DB::table('product')
				->join('category','product.category_id','=','category.category_id')
				->select(
					'product.category_id',
					'category.categoryname'
				)
				->groupBy('product.category_id')
				->get();

		$data_product_count = DB::table('product')->count();

		return view('pages.showproduct')->with(
			array(
				'data_product'	=>$data_product,
				'data_product_count'=>$data_product_count
			)
		);
	}

	public function contact_submit()
	{
		// รับค่าคนที่ลงทะเบียน
		$data = array(
			"fullname" 	=> Request::input('fullname'),
			"email" 	=> Request::input('email')
		);

		//echo $data['email'];
		//echo $data['fullname'];
		
		Mail::send('emails.mail_template', array(), function($msg) use ($data)
		{
			$msg->from('contact@itgenius.co.th','IT GENIUS');
			$msg->to($data['email'],$data['fullname']);
			$msg->subject('ตอบกลับจาก IT Genius');
		});
		
	}


	// Login
	public function login()
	{
		return view('pages.admin.login');
		//return Hash::make('1234');
	}

	// Export Excel
	public function export()
	{
		// Excel::create('report', function($excel) {

		//     $excel->sheet('sheet1', function($sheet) {

		//         $sheet->fromArray(array(
		//             array('data1', 'data2'),
		//             array('data3', 'data4')
		//         ));

		//     });

		// })->export('xls');

		Excel::create('Product', function($excel) {

		    $excel->sheet('Excel sheet', function($sheet) {
		        $sheet->setOrientation('landscape');

		         $sheet->fromModel(Product::all());

		    });

		})->export('xls');

	}
}
