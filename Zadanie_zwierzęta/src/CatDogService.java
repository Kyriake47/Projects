import AnimalAndOwner.*;

import java.util.Scanner;

public class CatDogService extends CatDog implements AnimalService {


    Scanner scanner = new Scanner(System.in);


    @Override
    public void AddAnimal(Owner owner) {
        if (owner.getNumberOfAnimals() >= 3) {
            System.out.println("Wlasciciel nie moze miec juz wiecej zwierzat");
            return;
        }
        if (this.getCatDo().equals(CatDo.CAT)) {
            if (owner.getAge() >= 10) {
                AddAnimalCat(owner);
            } else if (owner.getAge() < 10) {
                System.out.println("Wlasciciel kota musi miec wiecej niz 10 lat");
            }
        } else if (this.getCatDo().equals(CatDo.DOG)) {
            if (owner.getAge() >= 15) {
                AddAnimalDog(owner);
            } else if (owner.getAge() < 15) {
                System.out.println("Wlasciciel psa musi miec wiecej niz 15 lat");
            }
        }
    }

    public void AddAnimalCat(Owner owner) {
        System.out.println("Podaj imie kota");
        String nameCat = scanner.next();

        Gender gender = null;
        do {
            System.out.println("Podaj plec kota. Dostepne to: ");
            Gender[] genders = Gender.values();
            for (Gender Gender : genders) {
                System.out.println(Gender.name());
            }

            try {
                gender = Gender.valueOf(scanner.next());
            } catch (IllegalArgumentException e) {
                System.out.println("nie ma takiej na liście");

            }
            ;
        } while (gender == null);

        int age = 41;
        do {
            System.out.println("Podaj wiek kota");
            Scanner scage = new Scanner(System.in);

            if (scage.hasNextInt()) {
                age = scage.nextInt();
            }

            if (age > 40) {
                System.out.println("Nieprawidlowa wartosc wieku. (Najstarszy kot dozyl 38 lat.)");

            }

        } while (age < 0 || age > 40);

        System.out.println("Podaj rase kota");
        String breed = scanner.next();


        owner.addTab(new CatDog(nameCat, gender, age, owner, breed, CatDo.CAT));
    }

    ;

    public void AddAnimalDog(Owner owner) {
        System.out.println("Podaj imie psa");
        String nameDog = scanner.next();

        Gender gender = null;
        do {
            System.out.println("Podaj plec psa. Dostepne to: ");
            Gender[] genders = Gender.values();
            for (Gender Gender : genders) {
                System.out.println(Gender.name());
            }

            try {
                gender = Gender.valueOf(scanner.next());
            } catch (IllegalArgumentException e) {
                System.out.println("nie ma takiej na liście");

            }
            ;
        } while (gender == null);


        int age = 21;
        do {
            System.out.println("Podaj wiek psa");
            Scanner scage = new Scanner(System.in);
            //age = scage.nextInt();
            if (scage.hasNextInt()) {
                age = scage.nextInt();
            }

            if (age > 20) {
                System.out.println("Nieprawidlowa wartosc wieku. Najstarsze psy dozywaja 20 lat.");

            }

        } while (age < 0 || age > 20);


        System.out.println("Podaj rase psa");
        String breed = scanner.next();

        owner.addTab(new CatDog(nameDog, gender, age, owner, breed, CatDo.DOG));
    }
}
