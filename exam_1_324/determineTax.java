// Filename: determineTax.jar

public class determineTax {
    public static void main(String[] args) {
        // Accepting the ID from the input
        if (args.length > 0) {
            String id = args[0]; // The first argument from the command line
            // Extract the first character (first number of the ID)
            char firstChar = id.charAt(0);
            // Check if the first character is a digit
            if (Character.isDigit(firstChar)) {
                int firstDigit = Character.getNumericValue(firstChar);

                // Output message based on the first digit
                switch (firstDigit) {
                    case 1:
                        System.out.println("Impuesto Alto");
                        break;
                    case 2:
                        System.out.println("Impuesto Medio");
                        break;
                    case 3:
                        System.out.println("Impuesto Bajo");
                        break;
                    default:
                        System.out.println("Impuesto Desconocido.");
                }
            } else {
                System.out.println("No se puede determinar.");
            }
        } else {
            System.out.println("Error.");
        }
    }
}
