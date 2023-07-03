<style>
    .paygate-button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .paygate-button:hover {
        background-color: #0069d9;
    }

    .paygate-button:focus {
        outline: none;
    }

    .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
    }

</style>



<div class="form-container">
    <form action="<?= $url ?>" method="POST">
        <?php foreach ($formFields as $name => $value): ?>
            <input type="hidden" name="<?= $name ?>" value="<?= $value ?>">
        <?php endforeach; ?>
        <button type="submit" class="paygate-button">Make Payment</button>
    </form>
</div>