<html>
<head>
    <title>Test 3.1</title>
    <style>
        #img1 {
            position: absolute;
            z-index: 9;
            text-align: center;
            width: 300px;
            height: 300px;
        }
        #img2 {
            position: absolute;
            z-index: 7;
            text-align: center;
            width: 200px;
            height: 200px;
        }
        #img1 img{
            width: 100%;
            height: auto;
        }
        #img2 img{
            width: 100%;
            height: auto;
        }

    </style>
</head>
<body>
<h1>картинка 1</h1>
<div id="img1">
<img src="1.jpg">
</div>
<h1 style="margin-top: 350px">картинка 2</h1>
<div id="img2">
    <img src="2.jpg">
</div>
</body>
<script>
    dragElement(document.getElementById(("img1")));
    dragElement(document.getElementById(("img2")));
    function dragElement(elmnt) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        if (document.getElementById(elmnt.id )) {
            document.getElementById(elmnt.id).onmousedown = dragMouseDown;
        } else {
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>
</html>