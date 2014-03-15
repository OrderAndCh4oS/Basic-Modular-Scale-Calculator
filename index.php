<?php require_once('mod-scale-calc.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Modular Scale Calculator</title>
        <meta name="description" content="A basic modular scale calculator for working out typographic rhythm. Designed and developed by Sean Cooper.">
        <meta name="viewport" content="width=960px">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="http://fast.fonts.net/jsapi/d200305d-8416-404a-a388-46e78638340d.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <article class="wrapper">
            <h1>Modular Scale Calculator</h1>

            <form method="post" action="index.php">
                <fieldset>
                    <legend>Calculator</legend>
                    <p><label for="base">Base Figure</label> <input id="base" name="base" type="number" value="<?php echo $base; ?>"></p>
                    <p><label for="alt">Important Figure</label> <input id="alt" name="alt" type="number" value="<?php echo $alt; ?>"></p>
                    <p>
                        <label for="ratio">Ratio</label>
                        <select id="ratio" name="ratio">
                            <option value="1.067" <?php if($ratio == 1.067) echo "selected" ?>>15:16&#8201;&ndash;&#8201;minor second</option>
                            <option value="1.125" <?php if($ratio == 1.125) echo "selected" ?>>8:9&#8201;&ndash;&#8201;major second</option>
                            <option value="1.2" <?php if($ratio == 1.2) echo "selected" ?>>5:6&#8201;&ndash;&#8201;minor third</option>
                            <option value="1.25" <?php if($ratio == 1.25) echo "selected" ?>>4:5&#8201;&ndash;&#8201;major third</option>
                            <option value="1.333" <?php if($ratio == 1.333) echo "selected" ?>>3:4&#8201;&ndash;&#8201;perfect fourth</option>
                            <option value="1.414" <?php if($ratio == 1.414) echo "selected" ?>>1:?2&#8201;&ndash;&#8201;aug. fourth / dim. fifth</option>
                            <option value="1.5" <?php if($ratio == 1.5) echo "selected" ?>>2:3&#8201;&ndash;&#8201;perfect fifth</option>
                            <option value="1.6" <?php if($ratio == 1.6) echo "selected" ?>>5:8&#8201;&ndash;&#8201;minor sixth</option>
                            <option value="1.618" <?php if($ratio == 1.618) echo "selected" ?>>1:1.618&#8201;&ndash;&#8201;golden section</option>
                            <option value="1.667" <?php if($ratio == 1.667) echo "selected" ?>>3:5&#8201;&ndash;&#8201;major sixth</option>
                            <option value="1.778" <?php if($ratio == 1.778) echo "selected" ?>>9:16&#8201;&ndash;&#8201;minor seventh</option>
                            <option value="1.875" <?php if($ratio == 1.875) echo "selected" ?>>8:15&#8201;&ndash;&#8201;major seventh</option>
                        </select>
                    </p>
                    <p class="submit"><input type="submit" name="submit" value="Submit"></p>
                </fieldset>
            </form>
            <table>
                <tr>
                    <th class="base-col">Base Scale</th>
                    <th class="alt-col">Alt Scale</th>
                </tr>
                <tr>
                    <?php
                        if(isset($scale)) {
                            foreach($scale as $row) {
                                $output = '<tr>';
                                $output .= '<td class="base-col"><span';
                                if($row[0] == $base) {
                                    $output .= ' class="base" ';
                                }
                                $output .= '>'.$row[0].'</span></td>';
                                $output .= '<td class="alt-col"><span';
                                if($row[1] == $alt) {
                                    $output .= ' class="alt" ';
                                }
                                $output .= '>'.$row[1].'</span></td>';
                                $output .= '</tr>';
                                echo $output;
                            }
                        }
                    ?>
                </tr>
            </table>
            <footer class="clearfix">
                <div>
                    <h2>Built by</h2>
                    <ul>
                        <li><a href="https://twitter.com/Sarkoma">@Sarkoma</a></li>
                        <li><a href="https://twitter.com/Sarkoma">@threeandme_</a></li>
                    </ul>
                </div>
                <div>
                    <h2>Github</h2>
                        <p><a href="https://github.com/sarcoma/Basic-Modular-Scale-Calculator">Modular Scale Calculator</a></p>
                </div>
                <div>
                    <h2>Further Resources</h2>
                    <ul>
                        <li><a href="http://alistapart.com/article/more-meaningful-typography">More Meaningful Typography</a></li>
                        <li><a href="http://www.goodreads.com/book/show/44735.The_Elements_of_Typographic_Style">The Elements of Typographic Style</a> </li>
                    </ul>
                </div>
            </footer>
        </article>
    </body>
</html>
