<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            form {
                padding: 15px;
                width: 90%;
            }

            input, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <form action="{{ route('process.payment') }}" method="POST">
        @csrf
        <h2>Stripe Payment</h2>

        <label for="cardholderName">Cardholder's Name</label>
        <input type="text" id="cardholderName" name="cardholderName" required>

        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" required>

        <label for="expMonth">Expiration Month</label>
        <input type="text" id="expMonth" name="expMonth" required>

        <label for="expYear">Expiration Year</label>
        <input type="text" id="expYear" name="expYear" required>

        <label for="cvc">CVC</label>
        <input type="text" id="cvc" name="cvc" required>

        <button type="submit">Submit Payment</button>
    </form>
</body>
</html>
