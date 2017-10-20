create table racer (
  racer_id int unsigned primary key auto_increment,   -- Уникальный идентификатор гонщика
  name text,          -- Имя
  middle_name text,   -- Отчество
  surname text,       -- Фамилия
  passport text,      -- Номер паспорта
  start_number text,  -- Предпочитаемый стартовый номер
  bd date,            -- Дата рождения
  phone text          -- Номер телефона
);

create table event (
  event_id int unsigned primary key auto_increment,   -- Уникальный идентификатор события
  dt date,            -- Дата события
  passed boolean,     -- Событие прошло
  ref text,           -- Ссылка на событие в инете
  name text,          -- Название
  descr text,         -- Описание
  place text          -- Место проведения
);

create table section (
  section_id int unsigned primary key auto_increment,
  name text,        -- Название класса. Обязательный класс "Общий" с ID 0, там будут все гонщики без учёта зачёта.
}

-- Организатор обязан дать таблицы по классам И общую без учётам классов.
create table result (
  result_id int unsigned primary key auto_increment,
  racer_id_ref int not null,    -- ID гонщика в racers. Гонщик должен быть добавлен заранее.
  event_id_ref int not null,    -- ID события, возможен только на существующее событие
  position int not null,        -- Занятое место
  section int not null,         -- Класс
  -- Копия полей racers как они были в загруженных итогах гонки тк они могут меняться от гонки к гонке.
  name text,          -- Имя
  middle_name text,   -- Отчество
  surname text,       -- Фамилия
  passport text,      -- Номер паспорта
  start_number text,  -- Фактический стартовый номер
  bd date,            -- Дата рождения
  phone text          -- Номер телефона
  --
);

create table rating (
  rating_id int unsigned primary key auto_increment,
  rate int not null,
  event_id_ref int not null,  -- считается после каждого события, собития сортируются по датам, текущий рейтинг по последнему событию.
  racer_id_ref int not null,  -- гонщик
  section_id_ref int not null -- класс. 
);
