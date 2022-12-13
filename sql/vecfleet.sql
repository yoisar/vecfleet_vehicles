-- vehicles 
CREATE TABLE `vecfleet_vehicles` (
    `type` BIGINT,
    `wheels` SMALLINT,
    `brand` BIGINT,
    `model` VARCHAR(1024),
    `patent` VARCHAR(1024),
    `chassis` VARCHAR(1024),
    `km_traveled` INT
);
INSERT INTO `vecfleet_vehicles`
VALUES (
        '1',
        4,
        '1',
        '1',
        '2932d2n4',
        'nsdondf3232',
        1008987
    );
-- vehicles types 
CREATE TABLE `vecfleet_vehicles_types` (`id` BIGINT, `type` VARCHAR(1024));
INSERT INTO `vecfleet_types`
VALUES (1, 'agile');
-- vechicles models
CREATE TABLE `vecfleet_vehicles_models` (`id` BIGINT, `type` VARCHAR(1024));
INSERT INTO `vecfleet_vehicle_models`
VALUES (1, 'Camioneta');