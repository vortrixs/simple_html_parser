<?php
/**
 * Normally the data and view would be acquired through a router.
 * In this case I'm manually inputing the array to make it a little easier to see whats happening.
 */

$data = [
    'title'        => 'this is the title',
    'subtitle_one' => 'this is the first subtitle',
    'content_one'  => 'this is the first paragraph',
    'subtitle_two' => 'this is the second subtitle',
    'content_two'  => 'this is the second paragraph',
    'footer'       => 'this is the footer',
];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Template</title>
    </head>
    <body>
        <?php
            require 'parser.php';
        
            try
            {
                $html = new Parser('content.php', $data);
                
                $output = $html->render();
            }
            catch (Exception $e)
            {
                $output = $e->getMessage();
            }
            finally
            {
                echo $output;
            }
        ?>
    </body>
</html>
