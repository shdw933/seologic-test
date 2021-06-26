<html>
    <head>
    <title>Test 3.2</title>
    <link rel="stylesheet" href="style.css">
    <script src="derevo.js"></script>
    </head>
    <body>
            <div onclick="tree_toggle(arguments[0])">
                <div>ГЛАВНАЯ</div>
                <ul class="Container">
                    <li class="Node IsRoot IsLast ExpandClosed">
                        <div class="Expand"></div>
                        <div class="Content">МЕНЮ </div>
                        <ul class="Container">
                            <li class="Node ExpandClosed">
                                <div class="Expand"></div>
                                <div class="Content">ПОДМЕНЮ 1</div>
                                <ul class="Container">
                                    <li class="Node ExpandLeaf">
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 1</div>
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 2</div>
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 3</div>
                                    </li>
                                </ul>
                            </li>
                            <li class="Node ExpandClosed">
                                <div class="Expand"></div>
                                <div class="Content">ПОДМЕНЮ 2</div>
                                <ul class="Container">
                                    <li class="Node ExpandLeaf">
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 1</div>
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 2</div>
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 3</div>
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 4</div>
                                        <div class="Expand "></div>
                                        <div class="Content ExpandLeaf">пункт 5</div>
                                    </li>
                                </ul>
                            </li>
                            <li class="Node IsLast ExpandClosed">
                                <div class="Expand"></div>
                                <div class="Content">ПОДМЕНЮ 3</div>
                                <ul class="Container">
                                    <li class="Node ExpandLeaf IsLast">
                                        <div class="Expand"></div>
                                        <div class="Content">пункт 1</div>
                                    </li>
                                </ul>
                        </ul>
                    </li>

                </ul>

            </div>
    </body>
</html>