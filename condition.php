
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
<?php
// $wilaya = 1; 

if($wilaya == 1){
    $commun = [
        'sidi aissa', 'msila', 'boussaada'
    ];
    print_r($commun) ;
    
    foreach($commun as $com):?>
        <option value="<?php print_r($com);?>"><?php print_r($com);?></option>
        <h2><?php print_r($com);?></h2>
 <?php   endforeach;
}




?>
</section>
</body>
</html>