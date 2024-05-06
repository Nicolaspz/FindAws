


<h1>Verify Your Phone</h1>
<form action="{{ route('verify-phone.submit') }}" method="POST">
    @csrf
    <label for="verification_code">Verification Code:</label>
    <input type="text" id="verification_code" name="verification_code" required>
    <button type="submit">Verify Phone</button>
</form>

