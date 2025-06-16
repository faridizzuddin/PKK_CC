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
            /* Dark grey for primary text - still good contrast */
            background-color: #ffffff;
            /* Pure white background for maximum ink saving */
        }

        h1,
        h2 {
            text-align: center;
            color: #343a40;
            /* Dark grey for main headings */
            margin-bottom: 15px;
        }

        h1 {
            font-size: 2.2em;
            font-weight: 600;
        }

        h2 {
            font-size: 1.6em;
            font-weight: 500;
            color: #6c757d;
            /* Medium grey for subheadings */
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            /* Very subtle shadow */
            border-radius: 6px;
            overflow: hidden;
            background-color: #f8f9fa;
            /* Very light grey table background */
            border: 1px solid #e0e0e0;
            /* Light grey border */
        }

        .info-table th,
        .info-table td {
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 15px;
            text-align: left;
        }

        .info-table th {
            background-color: #e9ecef;
            /* Light grey for info table header */
            font-weight: 600;
            color: #495057;
            /* Medium-dark grey text */
        }

        .section-title {
            margin-top: 40px;
            margin-bottom: 18px;
            font-size: 1.4em;
            font-weight: bold;
            color: #000000;
            /* Dark text for section titles */
            border-bottom: 2px solid #6c757d;
            /* Medium grey bottom border */
            padding-bottom: 8px;
            display: inline-block;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            /* Very subtle shadow */
            border-radius: 6px;
            overflow: hidden;
            background-color: #f8f9fa;
            /* Very light grey table background */
            border: 1px solid #e0e0e0;
            /* Light grey border */
        }

        .data-table th,
        .data-table td {
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 15px;
            text-align: center;
        }

        .data-table th {
            background-color: #6c757d;
            /* Medium grey for data table header */
            color: white;
            font-weight: 500;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Very light grey for row contrast */
        }

        .status-approved {
            color: #28a745;
            /* Keeping green for clear positive */
            font-weight: 500;
        }

        .status-pending {
            color: #ffc107;
            /* Keeping yellow for clear pending */
            font-weight: 500;
        }

        .status-rejected {
            color: #dc3545;
            /* Keeping red for clear negative */
            font-weight: 500;
        }
    </style>
</head>

<body>

    <h1><?= $title; ?></h1>

    <h2>Maklumat Program</h2>
    <table class="info-table">
        <tr>
            <th>Nama Pemohon</th>
            <td><?= $pemohon; ?></td>
        </tr>
        <tr>
            <th>Pusat Tanggungjawab</th>
            <td><?= $ptj; ?></td>
        </tr>
        <tr>
            <th>Tempat Program</th>
            <td><?= $tempat; ?></td>
        </tr>
        <tr>
            <th>Bilangan Peserta</th>
            <td><?= $bil_peserta; ?></td>
        </tr>
        <tr>
            <th>Tarikh Program</th>
            <td><?= $tarikh; ?></td>
        </tr>
        <tr>
            <th>Tarikh Permohonan</th>
            <td><?= $tarikh_mohon->format('j F Y'); ?></td>
        </tr>
    </table>

    <div class="section-title">Senarai Perkhidmatan</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perkhidmatan</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Komen</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($perkhidmatan as $p): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p->T03_NAMA_PERKHIDMATAN; ?></td>
                    <td><?= $p->T03_NAMA_PERKHIDMATAN; ?></td>
                    <td>
                        <?php if ($p->T05_PENGARAH == 1): ?>
                            <span class="status-approved">Diluluskan</span>
                        <?php elseif ($p->T05_PENGARAH === null): ?>
                            <span class="status-pending">Belum disahkan</span>
                        <?php else: ?>
                            <span class="status-rejected">Ditolak</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $p->T05_KOMEN_PENGARAH; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="section-title">Senarai Cenderamata</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Cenderamata</th>
                <th>Kuantiti</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($cenderamata as $c): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $c->T04_CNAMA; ?></td>
                    <td><?= $c->T07_BIL; ?></td>
                    <td>
                        <?php if ($p->T05_PENGARAH == 1): ?>
                            <span class="status-approved">Diluluskan</span>
                        <?php elseif ($p->T05_PENGARAH === null): ?>
                            <span class="status-pending">Belum disahkan</span>
                        <?php else: ?>
                            <span class="status-rejected">Ditolak</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="section-title">Invois</div>
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Perkara</th>
                <th>Kuantiti</th>
                <th>Jumlah Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($cenderamata as $c): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $c->T04_CNAMA; ?></td>
                    <td><?= $c->T07_BIL; ?></td>
                    <td>RM <?= number_format($c->T07_HARGA * $c->T07_BIL, 2); ?></td>
                    <td>
                        <?php if ($p->T05_PENGARAH == 1): ?>
                            <span class="status-approved">Diluluskan</span>
                        <?php elseif ($p->T05_PENGARAH === null): ?>
                            <span class="status-pending">Belum disahkan</span>
                        <?php else: ?>
                            <span class="status-rejected">Ditolak</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>