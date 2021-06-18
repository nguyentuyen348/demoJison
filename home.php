<?php
session_start();
echo 'hello' . $_SESSION['username'];
if ($_POST['username'] == 'POST') {
    session_destroy();
    header('http://localhost/demoJson/index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<?php
include 'Product.php';
include 'DataProduct.php';

if (isset($_POST['Add'])) {
    $sort = $_POST['sort'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    if (empty($sort) || empty($name) || empty($price) || empty($img)) {
        echo 'Please enter product';
        return $product;
    } else
        $product = new Product ($sort, $name, $price, $img);
    DataProduct::addProduct($product);
}
?>

<body>
<form action="http://localhost/demoJson/home.php" method="post">
    <table>
        <tr>
            <td>sort:<input type="number" name="sort"></td>
            <td>name:<input type="text" name="name"></td>
            <td>price:<input type="text" name="price"></td>
            <td>img:<input type="text" name="img"></td>
            <td>
                <button type="submit" name="Add">Add</button>
            </td>
        </tr>
    </table>
</form>
<table>
    <thead>
    <caption><h1>Customer List</h1></caption>
    <tr>
        <th>sort</th>
        <th>name</th>
        <th>price</th>
        <th>img</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $filename = 'product.json';
    $json = file_get_contents($filename);
    $jsonData = json_decode($json);
    foreach ($jsonData as $product) {
        echo "
    <tr>
     <td>$product->sort</td>
     <td>$product->name</td>
     <td>$product->price</td>
     <td>$product->img</td> 
     </tr>   
     ";
    }
    ?>
    </tbody>
</table>
</body>
</html>



