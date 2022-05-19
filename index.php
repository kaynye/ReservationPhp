<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.6.2/css/lightpick.css">
    

</head>
<body>
    <div>
        <video width="100%" height="300px" style="object-fit: cover;" autoplay loop muted src="video.mp4" type="video/mp4"></video>
    </div>
    <form action="maRecherche.php" method="post">
        <input type="text" name="startDate" id="startDate"/>
        <input type="text" name="endDate"  id="endDate"/>
        <input type="submit">
    </form>
<script src="https://cdn.jsdelivr.net/npm/lightpick@1.6.2/lightpick.js"></script>
<script>
    
var picker = new Lightpick({
    field: document.getElementById('startDate'),
    secondField: document.getElementById('endDate'),
    singleDate: false,
    onSelect: function(start, end){
        var str = '';
        str += start ? start.format('DD/MMMM/YYYY') + ' à ' : '';
        str += end ? end.format('DD/MMMM/YYYY') : '...';
        document.getElementById('result-3').innerHTML = str;
    }
});
</script>
</body>
</html>
