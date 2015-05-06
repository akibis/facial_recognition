/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jsonparser;

import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import org.json.simple.JSONObject;
//import java.util.Arrays;
//import org.json.simple.JSONArray;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

/**
 *
 * @author Kevin Soncuya
 */
public class JsonParserUtil {

    /**
     * @param args the command line arguments
     */
    private static String jsonFile = "filepath_to_json_file";

//    public static void main(String[] args) throws FileNotFoundException, IOException, ParseException {
//        try {
//            FileReader reader = new FileReader(jsonFile);
//            JSONObject jsonObject = (JSONObject) new JSONParser().parse(reader);
//
//            long id = (long) jsonObject.get("id");
//            System.out.println("id = " + id);
//
//            String user_id = (String) jsonObject.get("user_id");
//            System.out.println("user_id = " + user_id);
//
//            long contact_id = (long) jsonObject.get("contact_id");
//            System.out.println("contant_id = " + contact_id);
//            
//            String name = (String) jsonObject.get("name");
//            System.out.println("name = " + name);
//            
//            long phone = (long) jsonObject.get("phone");
//            System.out.println("phone = " + phone);
//            
//            String address = (String) jsonObject.get("address");
//            System.out.println("address = " + address);
//            
//            long match_found = (long) jsonObject.get("match_found");
//            System.out.println("match_found = " + match_found);
//            
////            JSONArray jsonArray = (JSONArray) jsonObject.get("Data");
////            
////            for(int i =0; i < jsonArray.size(); i++) {
////                System.out.println(jsonArray.get(i) +"\n");
////            }
//            
//
//        } catch(Exception e) {
//            e.printStackTrace();
//        }
//    }

}
