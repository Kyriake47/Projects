package AnimalAndOwner;

import java.util.Scanner;

public class CatDog extends Animal {

    private String breed; //rasa
    private CatDo catDo;


    public CatDog() {

    }

    public CatDog(String name, Gender gender, int age, Owner owner, String breed, CatDo catDo) {

        super(name, gender, age, owner);
        this.breed = breed;
        this.catDo = catDo;
    }

    public void CatDogInfo() {
        if (this.getCatDo().equals(CatDo.CAT)) {
            System.out.println("*****");
            System.out.println("Typ zwierzaka: kot");
            System.out.println("Imie kota: " + this.getName());
            System.out.println("Plec kota: " + this.getGender());
            System.out.println("Wiek kota: " + this.getAge());
            System.out.println("Rasa kota: " + this.getBreed());
        } else {
            System.out.println("*****");
            System.out.println("Typ zwierzaka: pies");
            System.out.println("Imie psa: " + this.getName());
            System.out.println("Plec psa: " + this.getGender());
            System.out.println("Wiek psa: " + this.getAge());
            System.out.println("Rasa psa: " + this.getBreed());
        }

    }

    public String getBreed() {
        return breed;
    }


    public void setCatDo(CatDo catDo) {
        this.catDo = catDo;
    }

    public CatDo getCatDo() {
        return catDo;
    }

    public void setBreed(String breed) {
        this.breed = breed;
    }
}

