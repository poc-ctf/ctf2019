package pl.net.divo.api.controller;

import lombok.AllArgsConstructor;
import org.springframework.core.env.Environment;
import org.springframework.http.HttpRequest;
import org.springframework.web.bind.annotation.CookieValue;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletResponse;
import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.Base64;

@RestController
@AllArgsConstructor
public class SerializerController {
    private final Environment environment;

    @RequestMapping("/system/settings")
    public void encode(HttpServletResponse response) throws Exception {
        Settings data = new Settings("awd", "awd");

        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        ObjectOutputStream oos = new ObjectOutputStream(baos);
        oos.writeObject(data);

        response.addCookie(new Cookie("settings", Base64.getEncoder().encodeToString(baos.toByteArray())));
    }

    @RequestMapping(value = "/system/settings/{name}")
    public Settings decode(@PathVariable("name") String encoded, @CookieValue(value = "settings") String encodedSettings) throws Exception {
        Base64.getDecoder().decode(encodedSettings);

        Settings settings = null;
        try {
            ByteArrayInputStream bais = new ByteArrayInputStream(Base64.getDecoder().decode(encodedSettings));
            ObjectInputStream ois = new ObjectInputStream(bais);
            settings = (Settings) ois.readObject();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }

        if (null == settings) {
            settings = new Settings("empty", "empty");
        }

        return settings;
    }

    @AllArgsConstructor
    public static class Settings implements Serializable {
        private String appName;
        private String appVersion;
    }
}
