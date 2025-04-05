<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Neue Bestellbenachrichtigung</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
      }
      .container {
        max-width: 600px;
        margin: auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }
      .header {
        text-align: center;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
      }
      .header h1 {
        color: #333333;
        font-size: 24px;
      }
      .content {
        padding: 20px 0;
        color: #555;
      }
      .content p {
        margin: 8px 0;
        font-size: 16px;
      }
      .order-details {
        background-color: #f9fafc;
        border: 1px solid #e3e8ee;
        border-radius: 6px;
        padding: 16px;
        margin-top: 10px;
      }
      .order-details p {
        margin: 12px 0;
        font-size: 15px;
      }
      .footer {
        margin-top: 30px;
        text-align: center;
        font-size: 13px;
        color: #888;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1>🛒 Neue Bestellung erhalten!</h1>
      </div>

      <div class="content">
        <p>Hallo Admin,</p>
        <p>Es wurde gerade eine neue Bestellung aufgegeben. Hier sind die Details:</p>

        <div class="order-details">
          <p><strong>Bestell-ID:</strong> #{{ $order->id }}</p>
          <p><strong>Kundenname:</strong> {{ $order->customer_name }}</p>
          <p><strong>E-Mail:</strong> {{ $order->customer_email }}</p>
          <p><strong>Telefon:</strong> {{ $order->customer_phone }}</p>
          <p>
            <strong>Lieferadresse:</strong><br />
            {{ $order->customer_adress }}
          </p>
          <p>
            <strong>Bemerkung:</strong><br />
            {{ $order->order_note }}
          </p>
        </div>

        <p>Bitte melden Sie sich im Admin-Panel an, um diese Bestellung zu verwalten.</p>
      </div>

      <div class="footer">&copy; 2025 Horeca-Kaya. Alle Rechte vorbehalten.</div>
    </div>
  </body>
</html>
