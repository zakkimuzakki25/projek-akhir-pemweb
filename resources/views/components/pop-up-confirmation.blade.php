<link rel="stylesheet" type="text/css" href="{{ asset('css/pop-up-confirmation.css') }}">
<div class="confirmation-overlay">
    <div class="confirmation-popup">
        <div class="confirmation-header">Konfirmasi</div>
        <h1>Apakah kamu yakin?</h1>
        <button class="confirmation-button confirmation-tidak" onclick="{{ $noHandle }}">Tidak</button>
        <button class="confirmation-button confirmation-iya" onclick="{{ $yesHandle }}">Iya</button>
    </div>
</div>
