/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jsonparser;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import org.apache.commons.io.FileUtils;

/**
 *
 * @author Kevin Soncuya
 */
public class ToJSON {

    private static String contact_id;
    private static boolean is_matched;
    private static float confidence_level;

    public static void main(String args[]) throws FileNotFoundException, IOException {
        String text_file = "C:/Users/Kevin/Documents/NetBeansProjects/JsonParser/src/jsonparser/sample.txt";
        File file = new File(text_file);
        String s1, s2, s3;

        s1 = (String) FileUtils.readLines(file).get(0);
        String split1[] = s1.split("=");
        contact_id = split1[1];

        s2 = (String) FileUtils.readLines(file).get(1);
        String split2[] = s2.split("=");
        confidence_level = Float.valueOf(split2[1]);

        s3 = (String) FileUtils.readLines(file).get(2);
        String split3[] = s3.split("=");
        if (split3[1].equals(" Found")) {
            is_matched = true;
        } else {
            is_matched = false;
        }

        System.out.println("Read from text file:");
        System.out.println("contact_id =" + contact_id);
        System.out.println("confidence_level = " + confidence_level);
        System.out.println("is_matched = " + is_matched);

        FacialRecognition fr = new FacialRecognition();
        fr.setContactID(contact_id);
        fr.setConfidenceLevel(confidence_level);
        fr.setIsMatched(is_matched);
        Gson gson = new GsonBuilder().setPrettyPrinting().create();

        //convert java object to JSON format
        String json = gson.toJson(fr);

        //write JSON to a file
        try {
            //write converted json data to a file named "CountryGSON.json"  
            FileWriter writer = new FileWriter("C:/Users/Kevin/Documents/NetBeansProjects/JsonParser/src/jsonparser/test.json", true);
            writer.write("" + json + ",\n");
            writer.close();

        } catch (IOException e) {
            e.printStackTrace();
        }

        //eventually need to change to send over back to client-side
        System.out.println();
        System.out.println("Coverting strings into JSON...");
        System.out.println(json);

    }
}
