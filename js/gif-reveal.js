const GIFS_CONTAINER = document.getElementById("gifs-container");
let gifs = GIFS_CONTAINER.querySelectorAll(":scope span.gif-child");

gifs.forEach((item) => {
	item.addEventListener("mouseleave", () => {
    document.querySelector("#gif_"+item.dataset.gifContent).classList.remove("block");
    document.querySelector("#gif_"+item.dataset.gifContent).classList.add("hidden");
	});
	item.addEventListener("mouseenter", () => {
    var temp = item.dataset.gifContent;
    document.querySelector("#gif_"+item.dataset.gifContent).classList.remove("hidden");
    document.querySelector("#gif_"+item.dataset.gifContent).classList.add("block");
	});
});
