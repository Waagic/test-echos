<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostFixtures extends Fixture
{
    public const TITLES = [
        "Lorem ipsum dolor sit amet",
        "Consectetur adipiscing elit",
        "Donec fringilla nibh eros",
        "At pulvinar ligula sollicitudin",
        "In dui magna"
    ];
    public const CONTENT = [
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla nibh eros, at pulvinar ligula sollicitudin finibus. In dui magna, scelerisque ut hendrerit vel, pretium id mi. Ut id gravida lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce mi leo, sollicitudin vitae bibendum sit amet, luctus et eros. Aliquam aliquam dolor consectetur quam venenatis malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla et hendrerit tortor, id semper tellus. Nulla bibendum lectus non leo lacinia posuere. Morbi at justo ut massa ullamcorper imperdiet quis eget risus. Aliquam aliquet sollicitudin consequat. Mauris fermentum lacus quis dignissim porta. Pellentesque eu placerat augue. Aenean tincidunt, erat ac tristique semper, dolor odio auctor sem, nec ultricies lorem justo at nulla. Nulla sed orci pulvinar, aliquet diam in, sollicitudin dolor. Fusce efficitur lorem nec urna pharetra, a pulvinar mi ullamcorper.",
        "Suspendisse eget nibh vitae nisi faucibus volutpat. Vestibulum tempus felis eget pretium tempus. In hac habitasse platea dictumst. Morbi eu suscipit magna, vitae porttitor tellus. Vivamus venenatis ut libero a vehicula. Maecenas quis felis quam. Nunc ultricies ligula sed dolor dignissim gravida. Aenean a vehicula lorem. Aenean elementum lobortis eros nec pharetra. Aliquam viverra mauris ut odio porta sagittis.",
        "Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam condimentum tempor facilisis. Morbi bibendum, ligula a pretium sodales, mi dolor rutrum turpis, eu fermentum ex lacus non nisl. Duis ac lectus luctus, facilisis metus eu, faucibus metus. Suspendisse finibus faucibus augue non fermentum. In accumsan diam ullamcorper turpis fermentum interdum. Vivamus finibus nec massa vel maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec in lectus ultrices, dictum dolor id, lobortis dolor. Curabitur scelerisque leo orci. Nam molestie massa sed pellentesque lobortis.",
        "Donec in massa interdum arcu porta rutrum. Suspendisse potenti. Vivamus lobortis diam vitae enim porta, sit amet porttitor lorem ornare. Ut faucibus enim porttitor imperdiet posuere. Etiam sagittis turpis in purus suscipit imperdiet. Maecenas volutpat, dolor faucibus ultricies egestas, libero dui consequat turpis, quis blandit eros metus in magna. In fermentum nisi vitae purus tincidunt pharetra. Maecenas tempus, neque non volutpat hendrerit, elit risus mattis urna, at lobortis magna ex et nibh. Morbi blandit neque in ante eleifend, eget lacinia turpis facilisis. Curabitur sit amet feugiat nunc. Integer egestas iaculis tortor eget suscipit. Nullam commodo pretium mi, in sodales eros tempor at. Duis aliquam nisi ut diam condimentum, eu dictum dui porta. Suspendisse augue quam, finibus quis tempor sit amet, venenatis et urna. Nunc ut volutpat odio, at eleifend mi.",
        "Nam id erat quis libero pretium egestas. Vestibulum ornare dui ut dolor dapibus varius. Aliquam nec pellentesque diam. Ut ullamcorper auctor lectus in commodo. In vitae tempus mauris. Proin orci orci, placerat ac orci eu, condimentum vulputate ligula. Nullam mollis nisl et quam tincidunt, a mattis augue pellentesque. Nam feugiat ex vitae tortor dictum semper. Aliquam accumsan sit amet ex ac ullamcorper. Nunc in blandit est. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed quis felis vel ligula maximus posuere nec sit amet nibh. Phasellus pretium, lacus nec congue rhoncus, nibh nisi varius elit, id euismod arcu tortor in augue. Nullam rhoncus urna augue, quis ornare eros cursus ut. Fusce venenatis eleifend nunc egestas euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas."
    ];

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $post = new Post();
            $post->setTitle(self::TITLES[array_rand(self::TITLES)]);
            $post->setContent(self::CONTENT[array_rand(self::CONTENT)]);
            $post->setSlug($this->slugger->slug($post->getTitle()).'-'.$i);
            $manager->persist($post);
        }
        $manager->flush();
    }
}