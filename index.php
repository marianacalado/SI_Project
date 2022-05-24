<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <!-- CSS Files MUDAR!!-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- O QUE O PROF TINHA-->
        <link href="style.css" rel="stylesheet">
        <link href="layout.css" rel="stylesheet">
        <link href="responsive.css" rel="stylesheet">
        <title>MyPharma</title>
    </head>
    <body>
        <h1><?php echo '1. Hello World!'?></h1>
        <a href="#teste">Test link!</a>
        <p>
            <?php echo//2
                '2. How are you, world?<br>
                I like you, world!<br>
                You are my $world.<br>
                Now, create a variable $world for the word “world” and echo the text to the browser,<br>
                substituting the “world” word for “people” on the first two lines, but not on the last:
                How are you, people?
                I like you, people!
                You are my $world';?>
        </p> 
        <?php 
        $letters = array('F', 'E', 'U', 'P');
        $text = implode('', $letters);
        echo "3. ";
        echo $text." is cool<br>";

        $names = array('Alice', 'Jane', 'John');
        //echo $names[1];
        echo "4. John has two friends: $names[1] and $names[0].<br><br>";
                    
        $array = array ('Brand' => 'Ferrari', 'hp' => 500, 2 => 'wheels', 'mine');
        foreach ($array as $value)
         echo "5. That $value with $value and 4 $value is $value <br><br>";

        
         while($expre)
            echo "● I will get a good grade on the exam.";
                  


        ?>

    </body>
</html>

