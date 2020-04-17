// $(document).ready(function() {
//     document.getElementById('statistic').addEventListener('click', function(e){  // EventTarget.addEventListener() поддерживается начиная с IE9, его можно заменить на onclick или добавить EventTarget.attachEvent()
//         if (window.XMLHttpRequest) {
//             e.preventDefault();  // по ссылке нельзя перейти, перенаправление осуществляется с помощью location в событии loadend
//             var http = new XMLHttpRequest(), href = this.href;
//             http.open('POST', '/statistic'); // ВНИМАНИЕ: заменить на свой адрес!
//             http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//             http.timeout = 10000;  // прервать запрос, если он длиться более 10 секунд
//             http.addEventListener('loadend', function() { location = href });
//             http.send('url=' + location);
//         }
//     });
// });