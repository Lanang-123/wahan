<?php

return [
	/*
    |--------------------------------------------------------------------------
    | MBM
    |--------------------------------------------------------------------------
    */
	'TICKET_STATUSES' => ['created', 'in-print', 'in-stock', 'in-use', 'used', 'expired'],
	'VOUCHER_TYPES' => ['amount', 'percentage'],
	'VOUCHER_STATUSES' => ['created', 'in-print', 'in-stock', 'in-use', 'used'],
	'PRODUCT_TYPES' => ['ticket', 'voucher'],
	'PAYMENT_TYPES' => ['cash', 'transfer'],

	'PERMISSIONS' => [
		[
			'name' => 'Master Data',
			'route_name' => 'master-data',
			'child' => [
				[
					'name' => 'Jenis Tiket',
					'route_name' => 'master-data|ticket-type-list|new-ticket-type|edit-ticket-type|create-ticket-type|update-ticket-type|delete-ticket-type',
					'child' => []
				], [
					'name' => 'Tiket',
					'route_name' => 'master-data|ticket-list|new-ticket|edit-ticket|create-ticket|update-ticket|delete-ticket',
					'child' => []
				], [
					'name' => 'Jenis Kendaraan',
					'route_name' => 'master-data|car-type-list|new-car-type|edit-car-type|create-car-type|update-car-type|delete-car-type',
					'child' => []
				], [
					'name' => 'Pemilik Wahana',
					'route_name' => 'master-data|ride-owner-list|new-ride-owner|edit-ride-owner|create-ride-owner|update-ride-owner|delete-ride-owner',
					'child' => []
				], [
					'name' => 'Wahana',
					'route_name' => 'master-data|ride-list|new-ride|edit-ride|create-ride|update-ride|delete-ride',
					'child' => []
				], [
					'name' => 'Guide',
					'route_name' => 'master-data|guide-list|new-guide|edit-guide|create-guide|update-guide|delete-guide',
					'child' => []
				], [
					'name' => 'Voucher',
					'route_name' => 'master-data|voucher-list|new-voucher|edit-voucher|create-voucher|update-voucher|delete-voucher',
					'child' => []
				]
			],
		], [
			'name' => 'Transaksi',
			'route_name' => 'transaction',
			'child' => [
				[
					'name' => 'Cetak Tiket/Voucher',
					'route_name' => 'transaction|print-list|new-print|create-print|download-print',
					'child' => []
				], [
					'name' => 'Serah Terima Tiket/Voucher',
					'route_name' => 'transaction|handover-list|detail-handover|accepted-handover',
					'child' => []
				], [
					'name' => 'Check in Parkir',
					'route_name' => 'transaction|new-parking|create-parking',
					'child' => []
				], [
					'name' => 'Penjualan Tiket/Voucher',
					'route_name' => 'transaction|new-order|create-order|check-code|print-order|cancel-order',
					'child' => []
				], [
					'name' => 'Check in Objek',
					'route_name' => 'transaction|new-object|create-object',
					'child' => []
				], [
					'name' => 'Check in Wahana',
					'route_name' => 'transaction|new-checkin-ride|create-checkin-ride',
					'child' => []
				], [
					'name' => 'Transfeer Fee Guide',
					'route_name' => 'transaction|transfer-fee-list|new-transfer-fee|edit-transfer-fee|create-transfer-fee|form-transfer-fee',
					'child' => []
				]
			],
		], [
			'name' => 'Laporan',
			'route_name' => 'report',
			'child' => [
				[
					'name' => 'Tiket',
					'route_name' => 'report|report-tickets',
					'child' => []
				], [
					'name' => 'Voucher',
					'route_name' => 'report|report-vouchers',
					'child' => []
				], [
					'name' => 'Kunjungan Objek',
					'route_name' => 'report|report-object',
					'child' => []
				], [
					'name' => 'Kunjungan Wahana',
					'route_name' => 'report|report-rides',
					'child' => []
				], [
					'name' => 'Parkir',
					'route_name' => 'report|report-parkings',
					'child' => []
				], [
					'name' => 'Fee Guide',
					'route_name' => 'report|report-fee-transfers',
					'child' => []
				], [
					'name' => 'Penjualan',
					'route_name' => 'report|report-sales',
					'child' => []
				], [
					'name' => 'Penjualan dibatalkan',
					'route_name' => 'report|report-cancel-order',
					'child' => []
				], [
					'name' => 'Ticket/voucher keluar',
					'route_name' => 'report|report-checkout',
					'child' => []
				]
			],
		]
	]

];
