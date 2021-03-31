let counterDisplay = document.querySelector(".counter-display");
let handlePlus = document.getElementById("handleplus");
let handleMin = document.getElementById("handlemin");
let harga = document.getElementById("harga");
const cart = document.getElementById("count-cart");
let btnCart = document.querySelector(".btn-tocart");
let textCart = document.queryCommandValue(".title-cart");
let count = 1;
let updateHarga = count * parseInt(harga.textContent);
cart.textContent = textCart;
updateCount();
handlePlus.addEventListener("click", function () {
	const hasil = new Intl.NumberFormat("id-ID");
	const concuren = hasil.format(count++ * updateHarga++ * 2);
	harga.textContent = concuren;
	updateCount();
});
handleMin.addEventListener("click", function () {
	if (count <= 2) {
		handleMin.classList.toggle("hidden");
	} else if (count == 1) {
		handleMin.classList.toggle("hidden");
	}
	const hasil = new Intl.NumberFormat("id-ID");
	const concuren = hasil.format(count-- * updateHarga-- - 2);
	harga.textContent = concuren;
	updateCount();
});

btnCart.addEventListener("click", function () {
	cart.textContent = count;
});

function updateCount() {
	counterDisplay.innerHTML = count;
}
