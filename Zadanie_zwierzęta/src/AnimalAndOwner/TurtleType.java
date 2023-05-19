package AnimalAndOwner;

public enum TurtleType {
    TORTOISE("ladowy"), SWAMP("blotny"), SEA("morski");
    //żółw lądowy, błotny,morski

    private String plTurtle;

    TurtleType(String Turtle) {
        this.plTurtle = Turtle;
    }

    public String getPlCatDog() {
        return plTurtle;
    }


    @Override
    public String toString() {
        return plTurtle;
    }
}
