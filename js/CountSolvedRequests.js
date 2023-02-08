function countSolvedRequests(){
    fetch('https://pr-dmitriev.xn--80ahdri7a.site/request/count-solved-requests')
        .then(respone=>respone.text())
        .then(result=>{
            let str = document.getElementById("countSolvedRequests");
            str.textContent = result;
            if (sessionStorage.getItem("count_request") == null || result != sessionStorage.getItem("count_request")){
                sessionStorage.setItem("count_request",result);
                var audio = new Audio();
                audio.src = "../sound/blumk.mp3"
                audio.autoplay = true;
            }
        });
}