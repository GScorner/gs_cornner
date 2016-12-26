<?php

class model_gs extends CI_Model {

  public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

  public function show_list()
  {
    $sql = "SELECT p.picture_list,p.picture_box,p.idProduct,p.nameProduct,p.price,c.nameCategory,p.quantityProduct FROM product p join category c on p.idcategory = c.idcategory";
    $query = $this->db->query($sql);
    return $query;
  }

  public function show_cate_all($cate)
  {
    $sql = "SELECT p.picture_list,p.picture_box,p.idProduct,p.nameProduct,p.price,c.nameCategory,p.quantityProduct FROM product p join category c
    join type_gs t on p.idcategory = c.idcategory and t.idtype = c.idtype where p.idcategory='$cate'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function show_type_all($type)
  {
    $sql = "SELECT p.picture_list,p.picture_box,p.idProduct,p.nameProduct,p.price,c.nameCategory,p.quantityProduct FROM product p join category c join type_gs t
            on p.idcategory = c.idcategory and t.idtype = c.idtype where c.idtype='$type'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function show_detail($id)
	{
    $sql = "SELECT * FROM product where idProduct='$id'";
    $query = $this->db->query($sql);
    return $query;
	}
  public function s_lavel()
	{
    $level = (isset($_POST["flevel"])?$_POST["flevel"]:"");
    $sql = "SELECT p.picture_list,p.picture_box,p.idProduct,p.nameProduct,p.price,c.nameCategory,p.quantityProduct
    FROM product p join category c on p.idcategory = c.idcategory
    where price<='$level'";
    $query = $this->db->query($sql);
    return $query;
	}
  public function s_name($name)
	{
    $sql = "SELECT p.picture_list,p.picture_box,p.idProduct,p.nameProduct,p.price,c.nameCategory,p.quantityProduct
    FROM product p join category c on p.idcategory = c.idcategory
    WHERE nameProduct LIKE '%$name%'";
    $query = $this->db->query($sql);
    return $query;
	}
  public function get_category()
	{
    $sql = "SELECT * FROM category";
    $query = $this->db->query($sql);
    return $query;
	}

  public function get_type()
	{
    $sql = "SELECT * FROM type_gs";
    $query = $this->db->query($sql);
    return $query;
	}
  public function set_register()
	{
    $username = (isset($_POST["username"])?$_POST["username"]:"");
    $fname = (isset($_POST["fname"])?$_POST["fname"]:"");
    $lname = (isset($_POST["lname"])?$_POST["lname"]:"");
    $email = (isset($_POST["email"])?$_POST["email"]:"");
    $password = (isset($_POST["pass_confirmation"])?$_POST["pass_confirmation"]:"");
		echo $password;
    $sql ="INSERT INTO customer (username,password,fname,lname,Email,activeflag,idtype_user)
    VALUES ('".$username."','".$password."','".$fname."','".$lname."','".$email."','1','u002')";
    $query = $this->db->query($sql);
    $_SESSION["username"] = $username;
    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $_SESSION["Email"] = $email;
    $_SESSION["idtype_user"] = 'u002';
    return $query;
	}
  public function check()
	{
    $user = (isset($_REQUEST["username"])?$_REQUEST["username"]:'');
		$pass = (isset($_REQUEST["password"])?$_REQUEST["password"]:'');
	   $sql = "SELECT * FROM user where username='$user' AND password='$pass'";
     $query = $this->db->query($sql);
     $ch = false;
     foreach($query->result_array() as $row){
       $db_user = $row["username"];
       $db_fname = $row["fname"];
       $db_lname = $row["lname"];
       $db_Email = $row["Email"];
       $db_idtype_user = $row["idtype_user"];
     }
     if($db_user == $user){
       $ch = true;
       $_SESSION["username"] = $db_user;
       $_SESSION["fname"] = $db_fname;
       $_SESSION["lname"] = $db_lname;
       $_SESSION["Email"] = $db_Email;
       $_SESSION["idtype_user"] = $db_idtype_user;
     }
     return $ch;
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
  public function get_orders()
  {
    $sql ="SELECT * FROM orders";
    $query = $this->db->query($sql);
    return $query;
  }
  public function set_order($amount,$quan)
  {
    $sql = "INSERT INTO orders (quantity,activeflag,amountTotal,user)
    VALUES ('".$quan."','1','".$amount."','".$_SESSION["username"]."')";
    $query = $this->db->query($sql);
  }

  public function get_idOrder(){
    $sql = "SELECT idOrder FROM orders ORDER BY idOrder DESC LIMIT 1";
    $query = $this->db->query($sql);
    foreach($query->result_array() as $row){
      $q = $row["idOrder"];
    }
    return $q;
  }

  public function set_orderdetail($id,$price,$idproduct,$quan)
  {
      $sql = "INSERT INTO orderdetail (idOrder,amount,quantity,activeflag,idProduct) VALUES ('".$id."','".$price."','".$quan."','1','".$idproduct."')";
      $query = $this->db->query($sql);
  }

  public function get_max_min_price_product(){
    $sql = "SELECT MIN(price) min,MAX(price) max FROM product";
    $query = $this->db->query($sql);
    return $query;
  }

  public function show_order_detail($id){
    $sql = "SELECT * FROM orderdetail WHERE idOrder='$id'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function get_product_name(){
    $sql = "SELECT nameProduct FROM product";
    $query = $this->db->query($sql);
    return $query;
  }

  public function get_orders_date(){
    $sql = "SELECT dateOrdate,idOrder FROM orders";
    $query = $this->db->query($sql);
    return $query;
  }

  public function get_order_detail($idorder){
    $sql = "SELECT * FROM orderdetail where idOrder = '$idorder'";
    $query = $this->db->query($sql);
    return $query;
  }

  public function get_order_detail_default(){
    $sql = "SELECT idOrder FROM orders ORDER BY dateOrdate DESC LIMIT 1";
    $query1 = $this->db->query($sql);
    $sql2 = "SELECT * FROM orderdetail where idOrder = '$query1'";
    $query = $this->db->query($sql2);
    return $query;
  }

}
