<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

class ServiceContainerTest extends TestCase
{
    // public function testDependencyInjection()
    // {
    //     // $foo = new Foo();
    //     $foo1 = $this->app->make(Foo::class); // new Foo()
    //     $foo2 = $this->app->make(Foo::class); // new Foo()

    //     assertEquals("Foo", $foo1->foo());
    //     assertEquals("Foo", $foo2->foo());
    //     assertNotSame($foo1,  $foo2);
    // }

    public function testBind()
    {

        // closure
        $this->app->bind(Person::class, function () {
            return new Person("Yoga", "Dimas");
        });

        $person1 = $this->app->make(Person::class); // closure() // new Person("Yoga", "Dimas")
        $person2 = $this->app->make(Person::class); // closure() // new Person("Yoga", "Dimas")

        assertEquals("Yoga", $person1->firstName);
        assertEquals("Yoga", $person2->firstName);
        assertNotSame($person1, $person2); // objek berbeda
    }

    public function testSingleton()
    {

        $this->app->singleton(Person::class, function () {
            return new Person("Yoga", "Dimas");
        });

        $person1 = $this->app->make(Person::class); // new Person("Yoga", "Dimas"); ifnot exists
        $person2 = $this->app->make(Person::class); // return existing

        assertEquals("Yoga", $person1->firstName);
        assertEquals("Yoga", $person2->firstName);
        assertSame($person1, $person2); // objek sama
    }

    public function testInstance()
    {

        // sama seperti singleton
        $person = new Person("Yoga", "Dimas");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); // $person
        $person2 = $this->app->make(Person::class); // $person

        assertEquals("Yoga", $person1->firstName);
        assertEquals("Yoga", $person2->firstName);
        assertSame($person1, $person2);
    }

    // public function testDependencyInjectionFooBar()
    // {
    //     $foo = $this->app->make(Foo::class);
    //     $bar = $this->app->make(Bar::class);

    //     assertNotSame($foo, $bar->foo);
    // }

    // public function testDependencyInjectionFooBarSingletone()
    // {
    //     $this->app->singleton(Foo::class, function () {
    //         return new Foo();
    //     });

    //     $foo = $this->app->make(Foo::class);
    //     $bar = $this->app->make(Bar::class);
    //     $bar1 = $this->app->make(Bar::class);
    //     $bar2 = $this->app->make(Bar::class);


    //     assertSame($foo, $bar->foo);
    //     assertNotSame($bar1, $bar2);

    //     // bar1 dan bar2 merupakan objek yang berbeda
    // }

    public function testDependencyInjectionFooBarSingletoneClosure()
    {
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });

        // singleton pada Bar
        $this->app->singleton(Bar::class, function ($app) {
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        assertSame($foo, $bar1->foo);
        assertSame($bar1, $bar2);

        // bar1 dan bar2 merupakan objek yang sama
    }

    public function testInterfaceToClass()
    {
        // singleton(interface, class)
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // singleton(interface, closure)
        $this->app->singleton(HelloService::class, function () {
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        assertEquals("Halo Yoga", $helloService->hello("Yoga"));
    }
}
