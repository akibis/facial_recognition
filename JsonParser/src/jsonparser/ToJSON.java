/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jsonparser;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

/**
 *
 * @author Kevin Soncuya
 */
public class ToJSON {

    private String data1 = "test1";
    private String data2 = "test2";

    public static void main(String args[]) {
        ToJSON obj = new ToJSON();
        Gson gson = new GsonBuilder().setPrettyPrinting().create();

        //convert java object to JSON format
        String json = gson.toJson(obj);

        System.out.println(json);

    }

}
