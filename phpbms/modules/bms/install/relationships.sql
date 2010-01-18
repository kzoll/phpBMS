INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:eb5f285a-da6b-73e4-c098-878f517863b9', 'uuid', 'sales managers', 'salesmanagerid', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:66443c52-6dd4-b339-aee5-d9794d076e1b', 'clientid', 'sales orders', 'uuid', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:758183a0-d5f1-eb19-8acc-2de7789895c9', 'uuid', 'clients', 'clientid', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:f8ee5a95-a4b1-f55c-d01f-c705863c60b7', 'uuid', 'tax areas', 'taxareaid', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 'tbld:c9ff2c8c-ce1f-659a-9c55-31bca7cce70e', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:21988f3c-9c64-3b74-7ccc-1e71a2f82f2a', 'id', 'sales orders', 'invoiceid', 'tbld:31423480-a9b0-f0ff-749e-b3b5e18ca93c', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:c6a0e198-c91d-0bdc-0d1d-23d4e2a59faf', 'uuid', 'products', 'productid', 'tbld:31423480-a9b0-f0ff-749e-b3b5e18ca93c', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:1ddf2bf3-781e-21b1-9e1f-e424f725a5eb', 'uuid', 'parent products', 'parentid', 'tbld:8179e105-5487-5173-d835-d9d510cc7f1b', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:6675ec95-d545-3804-5ec2-5dc07618ef06', 'uuid', 'child products', 'childid', 'tbld:8179e105-5487-5173-d835-d9d510cc7f1b', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:b1371cef-370c-eb3e-6f52-079b9cd43b2d', 'categoryid', 'products', 'uuid', 'tbld:3342a3d4-c6a2-3a38-6576-419299859561', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:e70aa923-a782-68d4-b56e-0bc2f80c1ae6', 'productid', 'sales order line items', 'uuid', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 'tbld:31423480-a9b0-f0ff-749e-b3b5e18ca93c', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:15066548-3671-e611-19ac-e278a5d324fc', 'parentid', 'prerequisites', 'uuid', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 'tbld:8179e105-5487-5173-d835-d9d510cc7f1b', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:e48c9af6-babc-d43b-891c-cfc9b9329b71', 'taxareaid', 'sales orders', 'uuid', 'tbld:c9ff2c8c-ce1f-659a-9c55-31bca7cce70e', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:518b11b2-226a-2332-ceb4-b4f847b6cfec', 'salesmanagerid', 'sales person for clients', 'uuid', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:cd3a9dfd-6bbd-f9ca-ec56-3a7bc3f9d447', 'createdby', 'created clients', 'id', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:613ce2e2-ea78-8f6d-0106-0a6efe3f2b61', 'modifiedby', 'modified clients', 'id', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:e0e962f7-4309-b2cf-7532-a8b3090d7195', 'createdby', 'created sales orders', 'id', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:7718de55-eb15-15e8-51bf-b6800a338189', 'modifiedby', 'modified invoices', 'id', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:c497dcac-8b5b-8307-9d3c-5e321d4fd096', 'invoiceid', 'line items', 'id', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 'tbld:31423480-a9b0-f0ff-749e-b3b5e18ca93c', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:636d0e78-2118-6ff6-467e-753f81504d2b', 'discountid', 'sales orders', 'uuid', 'tbld:455b8839-162b-3fcb-64b6-eeb946f873e1', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:59b07233-576d-0130-0694-5191de94fc87', 'uuid', 'discounts', 'discountid', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 'tbld:455b8839-162b-3fcb-64b6-eeb946f873e1', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:06ff1e31-3b66-ccea-daf0-ab5bfb854ec5', 'uuid', 'clients', 'clientid', 'tbld:c595dbe7-6c77-1e02-5e81-c2e215736e9c', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:16245f6f-c65e-5226-068a-2be01cf9e822', 'clientid', 'AR items', 'uuid', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 'tbld:c595dbe7-6c77-1e02-5e81-c2e215736e9c', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:24a148ec-214c-4373-8205-49c61eea00cb', 'uuid', 'invoices', 'relatedid', 'tbld:c595dbe7-6c77-1e02-5e81-c2e215736e9c', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:4854cafd-b826-156b-a7f2-ca3f42939e39', 'relatedid', 'AR items', 'uuid', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 'tbld:c595dbe7-6c77-1e02-5e81-c2e215736e9c', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:887a9cf2-1207-27fb-d19e-d6aca96dccae', 'uuid', 'clients', 'clientid', 'tbld:43678406-be25-909b-c715-7e2afc7db601', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:cd96f32f-9285-50ea-a919-331b23453ed1', 'clientid', 'receipts', 'uuid', 'tbld:6d290174-8b73-e199-fe6c-bcf3d4b61083', 'tbld:43678406-be25-909b-c715-7e2afc7db601', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:bbef27de-ade8-6f22-e87d-481614b0ecca', 'uuid', 'product categories', 'categoryid', 'tbld:7a9e87ed-d165-c4a4-d9b9-0a4adc3c5a34', 'tbld:3342a3d4-c6a2-3a38-6576-419299859561', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:3d7d26c2-4d15-cbbf-ea78-0e1f342d62e5', 'shippingmethodid', 'sales orders', 'uuid', 'tbld:fa8a0ddc-87d3-a9e9-60b0-1bab374b2993', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:ca8384d2-cee1-35be-b9af-5e87bca450fc', 'paymentmethodid', 'sales orders', 'uuid', 'tbld:380d4efa-a825-f377-6fa1-a030b8c58ffe', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:cdbd96f9-7445-30d4-efc6-267b8ecb2dfa', 'paymentmethodid', 'receipts', 'uuid', 'tbld:380d4efa-a825-f377-6fa1-a030b8c58ffe', 'tbld:43678406-be25-909b-c715-7e2afc7db601', 1, NOW(), 1, NOW(), '1');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:caf9517c-4d66-8bd8-9ccb-b510be80fef9', 'uuid', 'receipts', 'relatedid', 'tbld:c595dbe7-6c77-1e02-5e81-c2e215736e9c', 'tbld:43678406-be25-909b-c715-7e2afc7db601', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:ab32b9a1-42ec-99ae-3e0f-492e199ec94b', 'assignedtoid', 'assigned to sales orders', 'uuid', 'tbld:afe6d297-b484-4f0b-57d4-1c39412e9dfb', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:7b79b739-9cfb-8401-1d50-279c4f1e6219', 'id', 'posting sessions', 'postingsessionid', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 'tbld:97760a4f-1c1a-a108-d05f-5fc4ec59583c', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:fede3e71-c563-8a70-e818-7b517b123883', 'id', 'posting sessions', 'postingsessionid', 'tbld:43678406-be25-909b-c715-7e2afc7db601', 'tbld:97760a4f-1c1a-a108-d05f-5fc4ec59583c', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:b25f7c4f-678e-b2e7-21c0-9c28fa034df7', 'postingsessionid', 'sales orders', 'id', 'tbld:97760a4f-1c1a-a108-d05f-5fc4ec59583c', 'tbld:62fe599d-c18f-3674-9e54-b62c2d6b1883', 1, NOW(), 1, NOW(), '0');
INSERT INTO `relationships` (`uuid`, `tofield`, `name`, `fromfield`, `fromtableid`, `totableid`, `createdby`, `creationdate`, `modifiedby`, `modifieddate`, `inherint`) VALUES ('rln:c003c109-b79b-eded-9acd-b251af8d92ec', 'postingsessionid', 'receipts', 'id', 'tbld:97760a4f-1c1a-a108-d05f-5fc4ec59583c', 'tbld:43678406-be25-909b-c715-7e2afc7db601', 1, NOW(), 1, NOW(), '0');
