<?php

use Illuminate\Database\Seeder;
use \App\Models\ReviewCharacteristic;
use \App\Models\ReviewCategory;

class ReviewCharacteristicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $characteristics = [
             'person' => [
                 ['name' =>  [
                     'en' => 'Honest',
                     'ru' => 'Честный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Loyal',
                     'ru' => 'Лояльный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Responsible',
                     'ru' => 'Ответственный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Respectful',
                     'ru' => 'Уважительный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Humble',
                     'ru' => 'Скромный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Forgiving',
                     'ru' => 'Снисходительный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Compassionate',
                     'ru' => 'Сострадательный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Fair',
                     'ru' => 'Справедливый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Authentic',
                     'ru' => 'Аутентичный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Courageous',
                     'ru' => 'Смелый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Generous',
                     'ru' => 'Щедрый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Polite',
                     'ru' => 'Вежливый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Kind',
                     'ru' => 'Добрый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Loving',
                     'ru' => 'Любящий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Reliable',
                     'ru' => 'Надежный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Conscientious',
                     'ru' => 'Добросовестный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Patient',
                     'ru' => 'Терпеливый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Thorough',
                     'ru' => 'Тщательный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Dishonest',
                     'ru' => 'Нечестный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Selfish',
                     'ru' => 'Эгоистичный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Arrogant',
                     'ru' => 'Высокомерный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Rude',
                     'ru' => 'Грубый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Cruel',
                     'ru' => 'Жестокий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Hypocritical',
                     'ru' => 'Лицемерный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Jealous',
                     'ru' => 'Ревнивый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Immoral',
                     'ru' => 'Аморальный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Greedy',
                     'ru' => 'Жадный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Lazy',
                     'ru' => 'Ленивый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Unscrupulous',
                     'ru' => 'Беспринципный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Vengeful',
                     'ru' => 'Мстительный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Deceptive',
                     'ru' => 'Обманчивый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Unforgiving',
                     'ru' => 'Неумолимый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Nasty',
                     'ru' => 'Противный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Aggressive',
                     'ru' => 'Агрессивный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Disrespectful',
                     'ru' => 'Неуважительный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Bossy',
                     'ru' => 'Властный',
                 ], 'is_positive' => false, 'is_published' => true,],
             ],
             'company' => [
                 ['name' =>  [
                     'en' => 'Adventurous',
                     'ru' => 'Авантюрный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Agile',
                     'ru' => 'Гибкий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Challenging',
                     'ru' => 'Испытывающий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Collaborative',
                     'ru' => 'Совместный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Creative',
                     'ru' => 'Творческий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Daring',
                     'ru' => 'Смелый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Energetic',
                     'ru' => 'Энергичный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Energizing',
                     'ru' => 'Возбуждающий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Fun',
                     'ru' => 'Веселый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Friendly',
                     'ru' => 'Дружелюбный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Inclusive',
                     'ru' => 'Инклюзивный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Innovate',
                     'ru' => 'Новаторский',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Inspiring',
                     'ru' => 'Вдохновляющий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Passionate',
                     'ru' => 'Страстный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Playful',
                     'ru' => 'Игривый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Progressive',
                     'ru' => 'Прогрессивный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Respectful',
                     'ru' => 'Уважительный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Rewarding',
                     'ru' => 'Награжденный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Biased',
                     'ru' => 'Пристрастный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Boring',
                     'ru' => 'Скучный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Discriminatory',
                     'ru' => 'Ущемляющий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Demanding',
                     'ru' => 'Придирчивый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Disengaged',
                     'ru' => 'Отключен',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Disrespectful',
                     'ru' => 'Дерзкий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Messy',
                     'ru' => 'Неряшливый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Micromanaging',
                     'ru' => 'Надзирающий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Inflexible',
                     'ru' => 'Негибкий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Deceptive',
                     'ru' => 'Обманчивый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Outdated',
                     'ru' => 'Устаревший',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Rigid',
                     'ru' => 'Жесткий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Stressful',
                     'ru' => 'Стрессовый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Toxic',
                     'ru' => 'Токсичный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Unethical',
                     'ru' => 'Неэтичный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Unforgiving',
                     'ru' => 'Неумолимый',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Unrewarding',
                     'ru' => 'Пахабный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Unsupportive',
                     'ru' => 'Безучастный',
                 ], 'is_positive' => false, 'is_published' => true,],
             ],
             'goods' => [
                 ['name' =>  [
                     'en' => 'Comfortable',
                     'ru' => 'Комфортный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Durable',
                     'ru' => 'Прочный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Effective',
                     'ru' => 'Эффективный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Ideal',
                     'ru' => 'Идеальный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Popular',
                     'ru' => 'Популярный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Quality',
                     'ru' => 'Качественный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Stylish',
                     'ru' => 'Стильный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Well-priced',
                     'ru' => 'Недорогой',
                 ], 'Well-priced', 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Useful',
                     'ru' => 'Полезный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Creamy',
                     'ru' => 'Сливочный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Delicious',
                     'ru' => 'Вкусный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Dangerous',
                     'ru' => 'Опасный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Fragrant',
                     'ru' => 'Ароматный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Nutritious',
                     'ru' => 'Питательный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Organic',
                     'ru' => 'Органический',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Peculiar',
                     'ru' => 'Своеобразный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  [
                     'en' => 'Smooth',
                     'ru' => 'Гладкий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Tempting',
                     'ru' => 'Заманчивый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' =>  'Bad', 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Faulty',
                     'ru' => 'Неисправный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Uncomfortable',
                     'ru' => 'Неудобный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Low quality',
                     'ru' => 'Низкокачественный',
                 ], 'Low quality', 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Outdated',
                     'ru' => 'Устаревший',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Impractical',
                     'ru' => 'Непрактичный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Overrated',
                     'ru' => 'Переоцененный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Primitive',
                     'ru' => 'Примитивный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Useless',
                     'ru' => 'Бесполезный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Bitter',
                     'ru' => 'Горький',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Chewy',
                     'ru' => 'Жевательный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Disgusting',
                     'ru' => 'Отвратительный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Harmful',
                     'ru' => 'Вредный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Horrible',
                     'ru' => 'Ужасный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Tasteless',
                     'ru' => 'Безвкусный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Terrible',
                     'ru' => 'Старшный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Unpleasant',
                     'ru' => 'Неприятный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Unusual',
                     'ru' => 'Необычный',
                 ], 'is_positive' => false, 'is_published' => true,],
             ],
             'vocations' => [
                 ['name' => [
                     'en' => 'Alive',
                     'ru' => 'Живой',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Attractive',
                     'ru' => 'Привлекательный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Beautiful',
                     'ru' => 'Красивый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Calm',
                     'ru' => 'Спокойный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Comfortable',
                     'ru' => 'Комфортный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Enchanting',
                     'ru' => 'Очаровательный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Exciting',
                     'ru' => 'Захватывающий',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Exotic',
                     'ru' => 'Экзотический',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Fascinating',
                     'ru' => 'Очаровательный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Friendly',
                     'ru' => 'Дружелюбный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Fun',
                     'ru' => 'Веселый',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Homey',
                     'ru' => 'Домашний',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Inexpensive',
                     'ru' => 'Недорогой',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Interesting',
                     'ru' => 'Интересный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Lively',
                     'ru' => 'Живой',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Peaceful',
                     'ru' => 'Мирный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Picturesque',
                     'ru' => 'Живописный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Unspoiled',
                     'ru' => 'Неиспорченный',
                 ], 'is_positive' => true, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Bleak',
                     'ru' => 'Мрачный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Boring',
                     'ru' => 'Скучный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Bustling',
                     'ru' => 'Шумный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Creepy',
                     'ru' => 'Жуткий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Crowded',
                     'ru' => 'Переполненный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Dangerous',
                     'ru' => 'Опасный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Desert',
                     'ru' => 'Пустынный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Desolate',
                     'ru' => 'Заброшенный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Dirty',
                     'ru' => 'Неприличный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Dull',
                     'ru' => 'Нудный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Hectic',
                     'ru' => 'Суматошный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Horrifying',
                     'ru' => 'Шокирующий',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Nightmarish',
                     'ru' => 'Кошмарный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Overcrowded',
                     'ru' => 'Переполненный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Polluted',
                     'ru' => 'Грязный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Pricey',
                     'ru' => 'Дорогой',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Stormy',
                     'ru' => 'Буйный',
                 ], 'is_positive' => false, 'is_published' => true,],
                 ['name' => [
                     'en' => 'Terrible',
                     'ru' => 'Ужасный',
                 ], 'is_positive' => false, 'is_published' => true,],
             ]
         ];

         foreach(ReviewCharacteristic::all() as $characteristic){
             $characteristic->delete();
         }
         foreach($characteristics as $characteristic_category => $characteristics){
             $category_id = ReviewCategory::where('slug', '=', $characteristic_category)->first()->id;
             foreach($characteristics as $characteristic){
                 $characteristic['review_category_id'] = $category_id;
                 $charactData = [
                     'review_category_id' => $category_id,
                     'is_positive' => $characteristic['is_positive'],
                     'is_published' => $characteristic['is_published'],
                 ];
                 foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale){
                     $charactData[$localeKey] = [
                         'name' => \Illuminate\Support\Arr::get($characteristic['name'], $localeKey, app('laravellocalization')->getDefaultLocale())
                     ];
                 }
                 ReviewCharacteristic::create($charactData);
             }
         }
     }
}
