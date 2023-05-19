package AnimalAndOwner;

public class Owner {
    private String name;
    private String surname;
    private Gender gender;
    private int age;

    private int numberOfCatsDogs = 0;
    private int numberOfTurtles = 0;
    private int numberOfAnimals = 0;
    private CatDog[] CatsDogs = new CatDog[3];
    private Turtle[] Turtles = new Turtle[3];


    public Owner() {

    }

    public Owner(String name, String surname, Gender gender, int age) {
        this.name = name;
        this.surname = surname;
        this.gender = gender;
        this.age = age;
    }

    public void ownerInfo() {
        System.out.println("    imie:       " + name);
        System.out.println("    nazwisko    " + surname);
        System.out.println("    plec        " + gender);
        System.out.println("    wiek        " + age);
        System.out.println("    ilosc zwierzat        " + numberOfAnimals);


    }

    public void addTab(CatDog catDog) {

        if (numberOfAnimals < 3) {
            CatsDogs[numberOfCatsDogs] = catDog;
            numberOfCatsDogs++;
            numberOfAnimals++;
        } else {
            System.out.println("Wlasciciel nie moze miec juz wiecej zwierzat");
        }
    }

    public void addTab(Turtle turtle) {

        if (numberOfAnimals < 3) {

            Turtles[numberOfTurtles] = turtle;
            numberOfTurtles++;
            numberOfAnimals++;

        } else {
            System.out.println("Wlasciciel nie moze miec juz wiecej zwierzat");
        }
    }


    public void AnimalInfo() {
        for (int i = 0; i < 3; i++) {
            if (CatsDogs[i] != null) {
                CatsDogs[i].CatDogInfo();
            }
        }
        for (int i = 0; i < 3; i++) {
            if (Turtles[i] != null) {
                Turtles[i].turtleInfo();
            }
        }
    }


    /////////////////////////////////////////////////  GET SET /////////////////////////////////////////////
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSurname() {
        return surname;
    }

    public void setSurname(String surname) {
        this.surname = surname;
    }

    public Gender getGender() {
        return gender;
    }

    public void setGender(Gender gender) {
        this.gender = gender;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public int getNumberOfAnimals() {
        return numberOfAnimals;
    }

    public void setNumberOfAnimals(int numberOfAnimals) {
        this.numberOfAnimals = numberOfAnimals;
    }

    public CatDog[] getCatsDogs() {
        return CatsDogs;
    }

    public void setCatsDogs(CatDog[] catsDogs) {

        CatsDogs = catsDogs;
    }

    public Turtle[] getTurtles() {
        return Turtles;
    }

    public void setTurtles(Turtle[] turtles) {
        Turtles = turtles;
    }

    public int getNumberOfCatsDogs() {
        return numberOfCatsDogs;
    }

    public int getNumberOfTurtles() {
        return numberOfTurtles;
    }

    public void setNumberOfCatsDogs(int numberOfCatsDogs) {
        this.numberOfCatsDogs = numberOfCatsDogs;
    }

    public void setNumberOfTurtles(int numberOfTurtles) {
        this.numberOfTurtles = numberOfTurtles;
    }

}
