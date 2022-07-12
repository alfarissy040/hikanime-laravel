$("#btnFocus").on("click", () => {
    if ($("#btnFocus").html() == "Cinema Off") {
        $(".dark-barier").css("display", "block");
        $("#btnFocus").html("Cinema On");
        $(".video").scrollTop();
    } else {
        $(".dark-barier").css("display", "none");
        $("#btnFocus").html("Cinema Off");
    }
});

const v360 = document.querySelector("#src360");
const v480 = document.querySelector("#src480");
const v720 = document.querySelector("#src720");

$("#resoulusi_360p").on("click", () => {
    $("#video").attr("src", v360.value);
});
$("#resoulusi_480p").on("click", () => {
    $("#video").attr("src", v480.value);
    console.log("diganti ke 480p");
});
$("#resoulusi_720p").on("click", () => {
    $("#video").attr("src", v720.value);
    console.log("diganti ke 720p");
});

function gantiSource(src) {
    $("#video").attr("src", src);
}

$(".btn-ganti-resolusi").on("click", function () {
    $(".video").html(
        `
        <video
            id="my-video"
            class="video-js z-3 w-100 h-100"
            controls
            preload="auto"
            height="480"
            poster="MY_VIDEO_POSTER.jpg"
            data-setup="{}">
            <source src="` +
            $(this).data("link") +
            `" type="video/mp4" id="video"/>
            <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            </p>
        </video>
    `
    );
});
