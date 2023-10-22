<?php require __DIR__ . '/inc.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Конструктор фігур</title>
</head>

<body>
<?php if(isset($_POST)) //print_r($_POST); ?>
    <div class="container">
        <h1>Побудувати фігуру</h1>
        <div class="row">

            <div class="figure">
                <h3>Квадрат</h3>
               
                <?php if(isset($_POST['square'])){

                    $square = new Square($_POST['square_width'], $_POST['square_height'], $_POST['square_color']);
                    if($square->validate){

                      echo '<div class="figure-item" 
                            style="
                            width:' . $square->width . 'px;
                            height:' . $square->height . 'px;
                            background-color:' . $square->color . ';
                        "></div>';

                        echo '<div class="figure-item-data">Площа фігури: ' . $square->area . 'px</div>';
                        echo '<div class="figure-item-data">Периметр фігури: ' . $square->length . 'px</div>';
                        
                    } else {
                        echo $square->getErrors(); 
                    }
                }
                ?>
                <div class="form">
                     <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Ширина</label>
                            <input type="text" name="square_width" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Висота</label>
                            <input type="text" name="square_height" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Колір</label>
                            <input type="text" name="square_color" value="">
                        </div>
                        <input type="hidden" name="square" value="1">

                        <button type="submit" class="btn">Намалювати</button>
                    </form>
                </div>
            </div> <!-- figure --> 

            <div class="figure">
                <h3>Прямокутник</h3>
                 <?php if(isset($_POST['rectangle'])){

                    $rectangle = new Rectangle($_POST['rectangle_width'], $_POST['rectangle_height'], $_POST['rectangle_color']);
                    if($rectangle->validate){

                      echo '<div class="figure-item" 
                            style="
                            width:' . $rectangle->width . 'px;
                            height:' . $rectangle->height . 'px;
                            background-color:' . $rectangle->color . ';
                        "></div>';

                        echo '<div class="figure-item-data">Площа фігури: ' . $rectangle->area . 'px</div>';
                        echo '<div class="figure-item-data">Периметр фігури: ' . $rectangle->length . 'px</div>';
                        
                    } else {
                        echo $rectangle->getErrors(); 
                    }
                }
                ?>
                <div class="form">
                     <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Ширина</label>
                            <input type="text" name="rectangle_width" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Висота</label>
                            <input type="text" name="rectangle_height" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Колір</label>
                            <input type="text" name="rectangle_color" value="">
                        </div>
                        <input type="hidden" name="rectangle" value="1">

                        <button type="submit" class="btn">Намалювати</button>
                    </form>
                </div>
            </div> <!-- figure --> 

            <div class="figure">
                <h3>Коло</h3>
                 <?php if(isset($_POST['circle'])){

                    $circle = new Circle($_POST['circle_width'], $_POST['circle_height'], $_POST['circle_color']);
                    if($circle->validate){

                      echo '<div class="figure-item" 
                            style="
                            width:' . $circle->width . 'px;
                            height:' . $circle->height . 'px;
                            background-color:' . $circle->color . ';
                            border-radius:' . $circle->radius . '%;
                        "></div>';

                        echo '<div class="figure-item-data">Площа фігури: ' . $circle->area . 'px</div>';
                        echo '<div class="figure-item-data">Периметр фігури: ' . $circle->length . 'px</div>';
                        
                    } else {
                        echo $circle->getErrors(); 
                    }
                }
                ?>
                <div class="form">
                     <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Ширина</label>
                            <input type="text" name="circle_width" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Висота</label>
                            <input type="text" name="circle_height" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Колір</label>
                            <input type="text" name="circle_color" value="">
                        </div>
                        <input type="hidden" name="circle" value="1">

                        <button type="submit" class="btn">Намалювати</button>
                    </form>
                </div>
            </div> <!-- figure --> 

        </div> <!-- row -->
    </div> <!-- container -->
    
</body>
</html>