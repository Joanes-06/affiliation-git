<h2>Votre lien de parrainage :</h2>
<input type="text" value="{{ $lienParrainage }}" readonly>
<button onclick="copyToClipboard()">Copier</button>

<script>
function copyToClipboard() {
    var copyText = document.querySelector("input");
    copyText.select();
    document.execCommand("copy");
    alert("Lien copié !");
}
</script>