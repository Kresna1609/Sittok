<?php
// memulai sesi
session_start();

// jika belum ada sesi "cart", membuat sesi dengan array kosong
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}

// menambahkan item ke keranjang
if(isset($_POST['add_to_cart'])){
  $item_id = $_POST['item_id'];
  $item_quantity = $_POST['item_quantity'];
  $item = array(
    'id' => $item_id,
    'quantity' => $item_quantity
  );
  array_push($_SESSION['cart'], $item);
}

// menghapus item dari keranjang
if(isset($_POST['remove_from_cart'])){
  $item_id = $_POST['item_id'];
  foreach($_SESSION['cart'] as $key => $item){
    if($item['id'] == $item_id){
      unset($_SESSION['cart'][$key]);
      break;
    }
  }
}

// mengosongkan keranjang
if(isset($_POST['empty_cart'])){
  unset($_SESSION['cart']);
}

// menampilkan keranjang
echo '<h2>Keranjang Belanja</h2>';
echo '<table>';
echo '<tr>';
echo '<th>ID Item</th>';
echo '<th>Jumlah</th>';
echo '<th>Action</th>';
echo '</tr>';
foreach($_SESSION['cart'] as $item){
  echo '<tr>';
  echo '<td>'.$item['id'].'</td>';
  echo '<td>'.$item['quantity'].'</td>';
  echo '<td>';
  echo '<form method="post" action="">';
  echo '<input type="hidden" name="item_id" value="'.$item['id'].'">';
  echo '<input type="submit" name="remove_from_cart" value="Hapus">';
  echo '</form>';
  echo '</td>';
  echo '</tr>';
}
echo '</table>';

echo '<form method="post" action="">';
echo '<input type="submit" name="empty_cart" value="Kosongkan Keranjang">';
echo '</form>';
?>
