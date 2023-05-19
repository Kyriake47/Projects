package AnimalAndOwner;

public enum CatDo {

    CAT("kot"), DOG("pies");

    private String plCatDog;

    CatDo(String CatDog) {
        this.plCatDog = CatDog;
    }

    public String getPlCatDog() {
        return plCatDog;
    }


    @Override
    public String toString() {
        return plCatDog;
    }
}
