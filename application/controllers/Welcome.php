<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
		{
			$name = isset($_POST['name_search'])?$_POST['name_search']:"";
			$type = (isset($_REQUEST["type"])?$_REQUEST["type"]:'');;
			$cate = (isset($_REQUEST["cate"])?$_REQUEST["cate"]:'');;
			$this->load->model('model_gs','mgs');
			if($type){
				$data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"all"=>$this->mgs->show_type_all($type),'name'=>$name);
			}
			else if($cate){
				$data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"all"=>$this->mgs->show_cate_all($cate),'name'=>$name);
			}
			else{
				$data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"all"=>$this->mgs->show_list(),'name'=>$name);
			}
			$this->load->view('header');
			$this->load->view('test',$data);
		}
	public function view_descripProduct()
	{
		$this->load->model('model_gs','mgs');
		$data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"all"=>$this->mgs->show_list());
		$this->load->view('header');
		$this->load->view('desProduct',$data);
	}
	public function signin()
	{
		$this->load->model('model_gs','mgs');
		$ch = $this->mgs->check();
		echo $ch;
			if($ch){
					echo "<script>alert('เข้าสู่ระบบเรียบร้อย');</script>";
			}
			else{
					echo "<script>alert('รหัสของท่านไม่ถูกต้อง');</script>";
			}
			redirect("Welcome");
		}
	public function logout()
	{
		session_destroy();
		echo "<script>alert('ออกจากระบบเรียบร้อย'); window.location ='index';</script>";
	}
	public function add2cart()
	{
		$id = (isset($_POST["pro_id"])?$_POST["pro_id"]:'');
		$price = (isset($_POST["pro_price"])?$_POST["pro_price"]:'');
		$name = (isset($_POST["pro_name"])?$_POST["pro_name"]:'');
		$pic= (isset($_POST["pro_pic"])?$_POST["pro_pic"]:'');
		$quantity = (isset($_POST["pro_quantity"])?$_POST["pro_quantity"]:'');
		$check;
		  foreach($_SESSION['pro_id'] as $key){
			if($_SESSION['pro_id'][$key]== $id){
				$check=1;
			}
		}
		if($check==1){
			$_SESSION['pro_id'][$id]=$id;
			$_SESSION['pro_name'][$id]=$name;
			$_SESSION['pro_price'][$id]=$price;
			$_SESSION['pro_pic'][$id]=$pic;
			$_SESSION['pro_quantity'][$id]=$_SESSION['pro_quantity'][$id]+$quantity;
		}else {
			$_SESSION['pro_id'][$id]=$id;
			$_SESSION['pro_name'][$id]=$name;
			$_SESSION['pro_price'][$id]=$price;
			$_SESSION['pro_pic'][$id]=$pic;
			$_SESSION['pro_quantity'][$id]=$quantity;
		}
		$_SESSION['pro_total'][$id]=$_SESSION['pro_total'][$id]+$quantity*$price;
		$_SESSION['pro_amount'][$id]=$_SESSION['pro_amount'][$id]+$quantity;
		redirect("Welcome");
}
	public function editadd2cart()
	{
		$quantity = (isset($_REQUEST["quan"])?$_REQUEST["quan"]:'');
		$id = (isset($_REQUEST["id"])?$_REQUEST["id"]:'');
		  foreach($_SESSION['pro_id'] as $key){
			if($_SESSION['pro_id'][$key] == $id){
				if($quantity>$_SESSION['pro_quantity'][$id]){
					$quanleft = $quantity - $_SESSION['pro_quantity'][$id];
					$_SESSION['pro_total'][$id]=$_SESSION['pro_total'][$id]+($quanleft*$_SESSION['pro_price'][$id]);
					$_SESSION['pro_amount'][$id]=$_SESSION['pro_amount'][$id]+$quanleft;
				}
				else{
					$quanleft = $_SESSION['pro_quantity'][$id] - $quantity;
					$_SESSION['pro_total'][$id]=$_SESSION['pro_total'][$id]-($quanleft*$_SESSION['pro_price'][$id]);
					$_SESSION['pro_amount'][$id]=$_SESSION['pro_amount'][$id]-$quanleft;
				}
				$_SESSION['pro_quantity'][$id] = $quantity;
				break;
			}
		}
		redirect("welcome/view_product");
}
	public function del_all_cart()
	{
		session_destroy();
		redirect("Welcome");
	}
	public function show_detail()
	{
		$id=(isset($_REQUEST['id'])?$_REQUEST['id']:'');
		$this->load->model('model_gs','mgs');
		$data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"detail"=>$this->mgs->show_detail($id),"all"=>$this->mgs->show_list());
		$this->load->view('header');
		$this->load->view('desProduct',$data);
	}
	public function register()
	{
		$this->load->model('model_gs','mgs');
		$data = $this->mgs->set_register();
		redirect("Welcome");
	}
	public function view_product()
	{
		$this->load->model('model_gs','mgs');
		$data = array("all"=>$this->mgs->show_list());
		$this->load->view('header');
		$this->load->view('view_product',$data);
	}
	public function view_register()
	{
		$this->load->view('register');
	}
	public function search_lavel()
	  {
			$name = (isset($_POST["name_search"])?$_POST["name_search"]:"");
	    $this->load->model('model_gs','mgs');
	    $data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"all"=>$this->mgs->s_lavel(),'name'=>$name);
	    $this->load->view('header');
	    $this->load->view('test',$data);
	  }
	  public function search_name()
	    {
	      $name = (isset($_POST["name_search"])?$_POST["name_search"]:"");
	      $this->load->model('model_gs','mgs');
	      $data = array("cate"=>$this->mgs->get_category(),"type"=>$this->mgs->get_type(),"all"=>$this->mgs->s_name($name),'name'=>$name);
	      $d = array("show"=>$name);
	      $this->load->view('header',$d);
	      $this->load->view('test',$data);
	    }
			public function order_all()
		    {
					$this->load->model('model_gs','mgs');
					$data = array("orders"=>$this->mgs->get_orders());
		      $this->load->view('views_order',$data);
		    }
				public function order()
				{
					$total = (isset($_REQUEST["total"])?$_REQUEST["total"]:'');
					$quan = (isset($_REQUEST["quantity"])?$_REQUEST["quantity"]:'');
					$this->load->model('model_gs','mgs');
					$this->mgs->set_order($total,$quan);
					$id = $this->mgs->get_idOrder();
					foreach($_SESSION["pro_id"] as $key){
						$price=$_SESSION["pro_price"][$key];
						$idproduct=$_SESSION["pro_id"][$key];
						$quan=$_SESSION["pro_quantity"][$key];
						$this->mgs->set_orderdetail($id,$price,$idproduct,$quan);
						unset($_SESSION["pro_id"]);
					}
			}
}
?>
