<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Bank - Download Documents</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }

    #container {
      max-width: 1100px;
      margin: 40px auto;
      padding: 20px;
    }

    .flex-container {
      display: flex;
      gap: 20px;
    }

    #sideleft {
      flex: 0 0 160px;
      text-align: center;
    }

    #sideleft img {
      border-radius: 12px;
      width: 100%;
      max-height: 350px;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    #contentcenter {
      flex: 1;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      overflow-y: auto;
      max-height: 600px;
    }

    h3 {
      color: #147d98;
      font-size: 24px;
      margin-bottom: 25px;
      text-align: center;
    }

    .download-table {
      width: 100%;
      border-collapse: collapse;
    }

    .download-table tr {
      transition: background-color 0.2s;
    }

    .download-table tr:hover {
      background-color: #f1f9ff;
    }

    .download-table td {
      padding: 15px;
      font-size: 16px;
      vertical-align: middle;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .download-table img {
      width: 60px;
      height: 60px;
      border-radius: 8px;
      object-fit: cover;
    }

    .download-link {
      text-decoration: none;
      color: #147d98;
      font-weight: bold;
      border: 1px solid #147d98;
      padding: 6px 12px;
      border-radius: 6px;
      transition: background-color 0.3s, color 0.3s;
    }

    .download-link:hover {
      background-color: #147d98;
      color: #fff;
    }

    @media (max-width: 768px) {
      .flex-container {
        flex-direction: column;
        align-items: center;
      }

      #sideleft {
        width: 100%;
      }

      #contentcenter {
        width: 100%;
      }

      .download-table td {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>

<div id="container">
  <div class="flex-container">
    
    <!-- Sidebar Image -->
    <div id="sideleft">
      <img src="images/blod.jpeg" alt="Blood Bank Services">
    </div>

    <!-- Main Content -->
    <div id="contentcenter">
      <h3>You Can Download Documents</h3>

      <table class="download-table">
        <tr>
          <td>
            <img src="pdf/1.jpg" alt="Doc 1">
            <span>1. BBMS1 Document</span>
            <a class="download-link" href="pdf/BBMS.pdf" target="_blank">Download</a>
          </td>
        </tr>
        <tr>
          <td>
            <img src="pdf/1.jpg" alt="Doc 2">
            <span>2.  Ahmed Report</span>
            <a class="download-link" href="pdf/ahmed.pdf" target="_blank">Download</a>
          </td>
        </tr>
        <tr>
          <td>
            <img src="pdf/1.jpg" alt="Doc 3">
            <span>3. BBMS2 Document</span>
            <a class="download-link" href="pdf/BBMS1.docx" target="_blank">Download</a>
          </td>
        </tr>
        <tr>
          <td>
            <img src="pdf/1.jpg" alt="Doc 4">
            <span>4. Upcoming Resource</span>
            <a class="download-link" href="#" target="_blank">Download</a>
          </td>
        </tr>
        <tr>
          <td>
            <img src="pdf/1.jpg" alt="Doc 5">
            <span>5. Additional Info</span>
            <a class="download-link" href="pdf/BBMS1.pdf" target="_blank">Download</a>
          </td>
        </tr>
        <tr>
          <td>
            <img src="pdf/1.jpg" alt="Doc 6">
            <span>6. Ahmed Hussen  Project Charter</span>
            <a class="download-link" href="pdf/ahmed.pdf" target="_blank">Download</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>

</body>
</html>
