<?php require_once( 'mod-scale-calc.php' ); ?>
<!DOCTYPE html>
<?php require_once ('oacc-ascii.php'); ?>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modular Scale Calculator</title>
    <meta name="description" content="A basic modular scale calculator for working out typographic rhythm. Designed and developed by Sean Cooper.">
    <meta name="viewport" content="width=1024px">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.v1.css">
    <script type="text/javascript" src="http://fast.fonts.net/jsapi/d200305d-8416-404a-a388-46e78638340d.js"></script>
    <?php include_once( 'google-analytics.php' ); ?>
</head>
<body>
<!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</p><![endif]--><!-- Add your site or application content here -->
<article class="wrapper">
    <h1>Modular Scale Calculator</h1>
    <p class="large">A double stranded, modular scale calculator.<br> For designing pages and layouts with typographic rhythm.</p>
    <p class="instructions">Figures can be entered as any straight value or as picas and points (<em>eg</em> 12p6 for 12 picas 6 points or 10pt for 10 points)</p>
    <form method="post" action="index.php">
        <fieldset>
            <legend>Calculator</legend>
            <p><label for="base">Figure</label> <input id="base" name="base" type="text" value="<?php echo $base; ?>">
            </p>
            <p><label for="alt">Important Figure</label>
                <input id="alt" name="alt" type="text" value="<?php echo $alt; ?>"></p>
            <p>
                <label for="ratio">Ratio</label> <select id="ratio" name="ratio">
                    <option value="1.067" <?php if ($ratio == 1.067)
                        echo "selected" ?>>15:16&#8201;&ndash;&#8201;minor second
                    </option>
                    <option value="1.125" <?php if ($ratio == 1.125)
                        echo "selected" ?>>8:9&#8201;&ndash;&#8201;major second
                    </option>
                    <option value="1.2" <?php if ($ratio == 1.2)
                        echo "selected" ?>>5:6&#8201;&ndash;&#8201;minor third
                    </option>
                    <option value="1.25" <?php if ($ratio == 1.25)
                        echo "selected" ?>>4:5&#8201;&ndash;&#8201;major third
                    </option>
                    <option value="1.333" <?php if ($ratio == 1.333)
                        echo "selected" ?>>3:4&#8201;&ndash;&#8201;perfect fourth
                    </option>
                    <option value="1.414" <?php if ($ratio == 1.414)
                        echo "selected" ?>>1:&radic;2&#8201;&ndash;&#8201;aug. fourth / dim. fifth
                    </option>
                    <option value="1.5" <?php if ($ratio == 1.5)
                        echo "selected" ?>>2:3&#8201;&ndash;&#8201;perfect fifth
                    </option>
                    <option value="1.6" <?php if ($ratio == 1.6)
                        echo "selected" ?>>5:8&#8201;&ndash;&#8201;minor sixth
                    </option>
                    <option value="1.618" <?php if ($ratio == 1.618 || !isset( $scale ))
                        echo "selected" ?>>1:1.618&#8201;&ndash;&#8201;golden section
                    </option>
                    <option value="1.667" <?php if ($ratio == 1.667)
                        echo "selected" ?>>3:5&#8201;&ndash;&#8201;major sixth
                    </option>
                    <option value="1.778" <?php if ($ratio == 1.778)
                        echo "selected" ?>>9:16&#8201;&ndash;&#8201;minor seventh
                    </option>
                    <option value="1.875" <?php if ($ratio == 1.875)
                        echo "selected" ?>>8:15&#8201;&ndash;&#8201;major seventh
                    </option>
                </select>
            </p>
            <p class="submit"><input type="submit" name="submit" value="Submit"></p>
        </fieldset>
    </form>
    <table>
        <tr>
            <th class="col">Base</th>
            <th class="col">Alt</th>
            <th class="col">Em Base</th>
            <th class="col">Em Alt</th>
            <th class="col">@16 Base</th>
            <th class="col">@16 Alt</th>
        </tr>
        <tr>
            <?php
            if (isset( $scale )) {
                foreach ($scale as $row) {
                    $output = '<tr>';
                    $output .= scaleRow($row[0], $basePoints);
                    $output .= scaleRow($row[1], $altPoints);
                    $output .= scaleRow($row[0], $basePoints, 'ems');
                    $output .= scaleRow($row[1], $altPoints, 'ems', $basePoints);
                    $output .= scaleRow($row[0], $basePoints, 'ems', 16);
                    $output .= scaleRow($row[1], $altPoints, 'ems', 16);
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
            </ul>
        </div>
        <div>
            <h2>Github</h2>
            <p><a href="https://github.com/sarcoma/Basic-Modular-Scale-Calculator">Modular Scale Calculator</a></p>
        </div>
        <div>
            <h2>Further Resources</h2>
            <ul>
                <li><a href="http://alistapart.com/article/more-meaningful-typography">More Meaningful Typography</a>
                </li>
                <li><a href="http://alistapart.com/article/content-out-layout">Content Out Layout</a></li>
                <li>
                    <a href="http://www.goodreads.com/book/show/44735.The_Elements_of_Typographic_Style">The Elements of Typographic Style</a>
                </li>
                <li><a href="http://www.guarnier.com/modularscale.html">Visual Examples of Modular Scales</a></li>
            </ul>
        </div>
    </footer>
</article>
<div class="logo" style="position: fixed; bottom: 30px; right:30px;">
    <a href="https://orderandchaoscreative.com">
        <img src="img/oacc-logo-web.opt.svg" style="width: 180px; height: auto;">
    </a>
</div>
</body>
</html>
