<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #343a40;
            background-color: #ffffff;
        }

        .report-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .report-title {
            font-size: 1.8em;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 5px;
        }

        .institution-name {
            font-size: 1em;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .system-name {
            font-size: 1.2em;
            color: #495057;
            margin-bottom: 4px;
            /* font-style: italic; */
        }

        h2 {
            text-align: left;
            color: #343a40;
            margin-top: 30px;
            margin-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 5px;
        }

        .info-table,
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            border: 1px solid #e0e0e0;
        }

        .info-table th,
        .info-table td,
        .data-table th,
        .data-table td {
            border: 1px solid #e0e0e0;
            padding: 8px 12px;
        }

        .info-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
            width: 30%;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #495057;
            text-align: center;
        }

        /* .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color:rgb(99, 143, 187);
            text-align: center;
        } */

        .data-table td {
            text-align: center;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .status-approved {
            color: #28a745;
            /* font-weight: bold; */
        }

        .status-pending {
            color: #ffc107;
            /* font-weight: bold; */
        }

        .status-rejected {
            color: #dc3545;
            /* font-weight: bold; */
        }

        .sebut-harga {
            background-color: rgb(210, 232, 255);
        }

        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #ccc;
            font-size: 11px;
            color: #6c757d;
            text-align: center;
        }

        .footer .date {
            margin-top: 5px;
            font-style: italic;
            color: #adb5bd;
        }

        .footer .note {
            margin-top: 8px;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>

<body>

    <div class="report-header">
        <div class="institution-logo">
            <img src="<?= FCPATH . 'images/logo_umt.png'; ?>" alt="UMT Logo" style="width: 100px; margin-bottom: 5px;">
        </div>
        <div class="institution-name">Universiti Malaysia Terengganu</div>
        <div class="system-name">Pejabat Komunikasi Korporat</div>
        <div class="report-title"><?= $title; ?></div>
    </div>

    <h2>Maklumat Program</h2>
    <table class="info-table">
        <tr>
            <th>Nama Pemohon</th>
            <td></td>
        </tr>
        <tr>
            <th>Pusat Tanggungjawab</th>
            <td></td>
        </tr>
        <tr>
            <th>Nama Program</th>
            <td></td>
        </tr>
        <tr>
            <th>Tempat Program</th>
            <td></td>
        </tr>
        <tr>
            <th>Bilangan Peserta</th>
            <td></td>
        </tr>
        <tr>
            <th>Tarikh Program</th>
            <td></td>
        </tr>
        <tr>
            <th>Tarikh Permohonan</th>
            <td></td>
        </tr>
    </table>

    <h2>Senarai Perkhidmatan</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perkhidmatan</th>
                <th>Harga (RM)</th>
                <th>Status</th>
                <th>Komen</th>
            </tr>
        </thead>
        <tbody>

    </table>

    <h2>Senarai Cenderamata</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Cenderamata</th>
                <th>Kuantiti</th>
                <th>Status</th>
                <th>Komen</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="footer">
        <div>Dokumen ini dijana secara automatik oleh sistem Pejabat Komunikasi Korporat.</div>
        <div class="date">Tarikh cetakan: <?= date('j F Y, h:i A'); ?></div>
        <div class="note">Sila hubungi Pejabat Komunikasi Korporat UMT untuk sebarang pertanyaan lanjut.</div>
    </div>

</body>

</html>